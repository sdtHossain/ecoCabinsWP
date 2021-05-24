===============================
  Project Setup Documentation
===============================


Project Name: ecoCabins
Digital Agency Services Wordpress Theme
-------------------------------------------

Created : 24/05/2021
By : shahadat
Email : mshossain509@gmail.com

Thank you for visiting ecoCabins theme!

ecoCabins is a WordPress-based project which uses WordPress 5.7.2.
I used underscores.me as a boilerplate with bootstrap 5. Has been set up Webpack 5.22.0 module bundler
to bundle bootstrap sass, magnific popup, and theme own javascript and stylesheets.Used Rubik and Merriweather
from google fonts as theme fonts and font-awesome for Icons. Please follow the guideline to setup the project



Installation
---------------

### Requirements

`ecoCabins` requires the following dependencies:

- [Node.js](https://nodejs.org/)


### Setup

1. Clone or download project's parent folder from https://github.com/sdtHossain/ecoCabinsWP.git

2. Setup an WordPress Environment

3. Paste project folder named "ecocabins" in wp-content/themes directory

   or

   Make a .zip file of project folder and upload theme from admin panel
	
   ```
   Dashboard->Appearance->Themes->Add New->Upload Theme->Choose File->Install Now
   
   ```

4. Go to ecocabins directory from wp-content/themes directory

5. To start using all the tools that come with `ecoCabins`  you need to install the necessary Node.js dependencies:

   ```
   $ npm install
  
   ```

   If you don't have to edit anything you can skip Step 2, 3, 4.


6. Go to src/sass directory and open app.scss file to add style

7. Go to src/js directory and open app.js file to add js

8. Run `npm run watch` and continue the development

9. Run `npm run build`

   Project Ready!



### Available CLI commands

   `ecoCabins` comes packed with CLI commands tailored for WordPress theme development :

   - `npm run watch` : watches all SASS files and recompiles them to css when they change.
   - `npm run build` : generates sass, images and js files for distribution, excluding development and system files.