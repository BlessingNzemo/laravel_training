const { mergeWith } = require('docz-utils')
const fs = require('fs-extra')

let custom = {}
const hasGatsbyConfig = fs.existsSync('./gatsby-config.custom.js')

if (hasGatsbyConfig) {
  try {
    custom = require('./gatsby-config.custom')
  } catch (err) {
    console.error(
      `Failed to load your gatsby-config.js file : `,
      JSON.stringify(err),
    )
  }
}

const config = {
  pathPrefix: '/',

  siteMetadata: {
    title: 'My Doc',
    description: 'My awesome app using docz',
  },
  plugins: [
    {
      resolve: 'gatsby-theme-docz',
      options: {
        themeConfig: {},
        src: './',
        gatsbyRoot: null,
        themesDir: 'src',
        mdxExtensions: ['.md', '.mdx'],
        docgenConfig: {},
        menu: [],
        mdPlugins: [],
        hastPlugins: [],
        ignore: [],
        typescript: false,
        ts: false,
        propsParser: true,
        'props-parser': true,
        debug: false,
        native: false,
        openBrowser: null,
        o: null,
        open: null,
        'open-browser': null,
        root: 'C:\\wamp64\\www\\laravel_training\\.docz',
        base: '/',
        source: './',
        'gatsby-root': null,
        files: '**/*.{md,markdown,mdx}',
        public: '/public',
        dest: '.docz/dist',
        d: '.docz/dist',
        editBranch: 'master',
        eb: 'master',
        'edit-branch': 'master',
        config: '',
        title: 'My Doc',
        description: 'My awesome app using docz',
        host: 'localhost',
        port: 3000,
        p: 3000,
        separator: '-',
        paths: {
          root: 'C:\\wamp64\\www\\laravel_training',
          templates:
            'C:\\wamp64\\www\\laravel_training\\node_modules\\docz-core\\dist\\templates',
          docz: 'C:\\wamp64\\www\\laravel_training\\.docz',
          cache: 'C:\\wamp64\\www\\laravel_training\\.docz\\.cache',
          app: 'C:\\wamp64\\www\\laravel_training\\.docz\\app',
          appPackageJson: 'C:\\wamp64\\www\\laravel_training\\package.json',
          appTsConfig: 'C:\\wamp64\\www\\laravel_training\\tsconfig.json',
          gatsbyConfig: 'C:\\wamp64\\www\\laravel_training\\gatsby-config.js',
          gatsbyBrowser: 'C:\\wamp64\\www\\laravel_training\\gatsby-browser.js',
          gatsbyNode: 'C:\\wamp64\\www\\laravel_training\\gatsby-node.js',
          gatsbySSR: 'C:\\wamp64\\www\\laravel_training\\gatsby-ssr.js',
          importsJs:
            'C:\\wamp64\\www\\laravel_training\\.docz\\app\\imports.js',
          rootJs: 'C:\\wamp64\\www\\laravel_training\\.docz\\app\\root.jsx',
          indexJs: 'C:\\wamp64\\www\\laravel_training\\.docz\\app\\index.jsx',
          indexHtml:
            'C:\\wamp64\\www\\laravel_training\\.docz\\app\\index.html',
          db: 'C:\\wamp64\\www\\laravel_training\\.docz\\app\\db.json',
        },
      },
    },
  ],
}

const merge = mergeWith((objValue, srcValue) => {
  if (Array.isArray(objValue)) {
    return objValue.concat(srcValue)
  }
})

module.exports = merge(config, custom)
