/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

 CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//config.extraPlugins = 'simpleImageUpload';
	config.filebrowserUploadMethod = 'form';
	config.extraPlugins = 'popup';
	config.extraPlugins = 'filebrowser';
	config.filebrowserImageUploadUrl = 'perguntas/uploadImageCKeditor';
};