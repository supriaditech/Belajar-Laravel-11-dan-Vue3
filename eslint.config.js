import globals from "globals";    
import pluginJs from "@eslint/js";    
import pluginVue from "eslint-plugin-vue";    
import pluginPrettier from "eslint-plugin-prettier";    
  
/** @type {import('eslint').Linter.Config[]} */    
export default [    
  {   
    files: ["**/*.{js,mjs,cjs,vue}"],   
    languageOptions: {   
      globals: globals.browser,   
      parser: "babel-eslint",   
    },  
    rules: {    
      "prettier/prettier": "error", // Show Prettier errors as ESLint errors    
    },  
  },  
  pluginJs.configs.recommended,    
  ...pluginVue.configs["flat/essential"],    
  pluginPrettier.configs.recommended, // Add Prettier rules    
];    
