<?php   
/*
# -------------------------------------------------------------------------------------
# plg_edvem : Editor button plugin for the eXtro-media Embed Video Plugin
# -------------------------------------------------------------------------------------
# author    eXtro-media GbR
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 3 or later - http://www.gnu.org/licenses/gpl-3.0.html
# website   www.eXtro-media.de
# technical support https://www.eXtro-media.de
# -------------------------------------------------------------------------------------
*/

    define( '_JEXEC', 1 );
    define( 'DS', DIRECTORY_SEPARATOR );
    define( 'JPATH_BASE', realpath( '..'.DS.'..'.DS.'..'.DS ) );    
    require_once ( JPATH_BASE.DS.'includes'.DS.'defines.php' );
    require_once ( JPATH_BASE.DS.'includes'.DS.'framework.php' );
 
    $mainframe = JFactory::getApplication('administrator');        
    jimport( 'joomla.plugin.plugin' );
    
 
    $jinput = JFactory::getApplication()->input;
    $ih_name = $jinput->get('ih_name', '', 'string');
    
    $lang = JFactory::getLanguage();
    $extension = 'plg_edvem';
    $base_dir = JPATH_BASE.'/administrator';
    $language_tag = $jinput->get('lang', 'en-GB', 'string');
    $lang->load($extension, $base_dir, $language_tag, true);

?>
<html>
    <head>
    <title><?php echo JText::_('PLG_EDVEM_TITLE'); ?></title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="../../../administrator/templates/isis/css/template.css?c5cf25cab274b47fd9fbab11e32fb9e7" type="text/css" />
    <script type="text/javascript">
 

        
        function insertTag() {
        	if (window.parent) {
        		var typ = document.getElementById('edvemtype').value;
        		var id  = document.getElementById('edvemid').value;
        	  if(id != '') {
        	    window.parent.jInsertEditorText('{vembed ' + typ + '=' + id + '}', '<?php echo $ih_name; ?>'); window.parent.jSelectEdvemCancel();
        	  } else {
        	  	document.getElementById('edvemid').style.backgroundColor = "red";
        	  }
        	}
        }
        	
       
    </script>
    </head>

    <body>
    
    <form class="form-horizontal" name="edvemform" id="edvemform" onSubmit="return false;">
    <div class="container-fluid">
     <div class="row-fluid">
      <div class="span12">
       <h3><?php echo JText::_('PLG_EDVEM_TITLE'); ?></h3>
      </div>
     </div>

     <div class="row-fluid">
      <div class="span12"><hr /><br /></div>
     </div>

     <div class="row-fluid">
      <div class="span4">
      <?php echo JText::_('PLG_EDVEM_TYPE'); ?>
      </div>
      <div class="span8">
        <select name="edvemtype" id="edvemtype" class="input-block-level">          
          <option value="Y">Youtube</option>
          <option value="F">Facebook</option>
          <option value="V">Vimeo</option>
          <option value="M" >MP4</option>
          <option value="D">Dailymotion</option>
          <option value="y">Myvideo</option>
          <option value="o">Dotsub</option>
          <option value="f">Funnyordie</option>
          <option value="l">Liveleak</option>
          <option value="m">Metacafe</option>
          <option value="s">Screenr</option>
          <option value="t">Stupidvideos</option>
          <option value="a">Traileraddict</option>
        </select>
      </div>
     </div>
     
     <div class="row-fluid">
      <div class="span4">
      <?php echo JText::_('PLG_EDVEM_ID'); ?>
      </div>
      <div class="span8">
        <input class="input-block-level" id="edvemid" name="edvemid" value="" />
      </div>
     </div>
     
     <div class="row-fluid">
      <div class="span12"><br /></div>
     </div>
     
     <div class="row-fluid">
      <div class="span4">

      </div>
      <div class="span6">
      <a href="javascript:void(0)" onclick="javascript:insertTag();"  class="btn btn-success"><?php echo JText::_('PLG_EDVEM_LOS'); ?></a>
      </div>
     </div>


    </div>
    </form>

    </body>
</html>