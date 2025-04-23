// filepath: /Users/vrajadas/development/tests-examples/eslint.config.js
const reactPlugin = require('eslint-plugin-react');
const reactHooksPlugin = require('eslint-plugin-react-hooks');
const reactRecommended = require('eslint-plugin-react/configs/recommended');
const jsdocPlugin = require('eslint-plugin-jsdoc');

module.exports = [
  {
    plugins: {
      react: reactPlugin,
      'react-hooks': reactHooksPlugin,
      jsdoc: jsdocPlugin,
    },
    settings: {
      react: {
        version: 'detect', // Automatically detect the React version
      },
    },
    languageOptions: {
      ecmaVersion: 2021,
      sourceType: 'module',
    },
    rules: {
      ...reactRecommended.rules, // Use React recommended rules
      'jsdoc/require-jsdoc': [
        'warn',
        {
          require: {
            FunctionDeclaration: true,
            MethodDefinition: true,
            ClassDeclaration: true,
            ArrowFunctionExpression: true,
            FunctionExpression: true,
          },
        },
      ],
      'jsdoc/check-alignment': 'warn',
      'jsdoc/check-indentation': 'warn',
      'jsdoc/check-param-names': 'warn',
    },
  },
];