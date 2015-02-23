<?php

class ContentBlocksButton extends cbBaseInput {
    public $defaultIcon = 'link';
    public $defaultTpl = '<div class="btn__wrap"><a href="[[+link]]" class="btn">[[+label]]</a></div>';

    /**
     * @return array
     */
    public function getJavaScripts() {
        $assetsUrl = $this->modx->getOption('contentblocksbutton.assets_url', null, MODX_ASSETS_URL . 'components/contentblocksbutton/');
        return array(
            $assetsUrl . 'js/inputs/contentblocksbutton.js',
        );
    }

    /**
     * @return array
     */
    public function getTemplates()
    {
        $tpls = array();
        
        // Grab the template from a .tpl file
        $corePath = $this->modx->getOption('contentblocksbutton.core_path', null, MODX_CORE_PATH . 'components/contentblocksbutton/');
        $template = file_get_contents($corePath . 'lib/templates/contentblocksbutton.tpl');
        
        // Wrap the template, giving the input a reference of "contentblocksbutton", and
        // add it to the returned array.
        $tpls[] = $this->contentBlocks->wrapInputTpl('ContentBlocksButton', $template);
        return $tpls;
    }


    //////////////////////////////////
    //////Name and description////////
    //////////////////////////////////
    public function getName()
    {
        return 'Button'; 
        // return $this->modx->lexicon('myawesomeinput.input_name');
    }
    
    public function getDescription()
    {
        return 'A basic button with a customisable label'; 
        // return $this->modx->lexicon('myawesomeinput.input_description');
    }

    /**
     * Process this field based on a row and a wrapper tpl
     *
     * @param cbField $field
     * @param array $data
     * @return mixed
     */
    public function process(cbField $field, array $data = array())
    {
        $data['link_raw'] = $data['link'];

        if($data['link'] != '') {
            if($data['linkType'] == 'email') {
                $data['link'] = 'mailto:' . $data['link'];
            }
            if($data['linkType'] == 'resource') {
                $data['link'] = '[[~' . $data['link'] . ']]';
            }
        }
        
        $tpl = $field->get('template');
        return $this->contentBlocks->parse($tpl, $data);
    }
    
    //////////////////////////////////
    //////  Field Properties  ////////
    //////////////////////////////////
    public function getFieldProperties()
        {
            return array(
                // array(
                //     'key' => 'label',
                //     'fieldLabel' => 'Label for button',
                //     'xtype' => 'textfield',
                //     'default' => '',
                //     'description' => 'This is the label on the button visible to users on the site'
                // ),
                // array(
                //     'key' => 'link',
                //     'fieldLabel' => 'Button target/link',
                //     'xtype' => 'textfield',
                //     'default' => '',
                //     'description' => 'This is where clicking the button will send visitors'
                // ),
            );
        }
}