module.exports = {
  'parser': 'babel-eslint',
  'env': {
    'browser': true,
    'es6': true,
    'jest': true,
    'node': true
  },
  'extends': [
    'plugin:import/errors',
    'plugin:import/warnings',
    'standard',
    'standard-jsx'
  ],
  'parserOptions': {
    'ecmaFeatures': {
      'jsx': true
    },
    'ecmaVersion': 2018,
    'sourceType': 'module'
  },
  'plugins': [
    'react'
  ],
  'rules': {
    'strict': ['error', 'global']
  },
  'settings': {
    'import/resolver': 'webpack'
  }
}
