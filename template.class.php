<?php
    class Template
    {
        private $assignedValues = array();
        private $partialBuffer  = '';
        private $tpl            = '';

        function __construct($_path = '')
        {
            if(!empty($_path))
            {
                if(file_exists($_path)){
                    $this->tpl = file_get_contents($_path);
                }
                else
                {
                    echo "<b>Template Eror:</b> Base File '{$_path}' Inclusion Error.";
                }
            }
        }

        function assign($_searchString, $_replaceString = '')
        {
            if(!empty($_searchString))
            {
                $this->assignedValues[strtoupper($_searchString)] = $_replaceString;
            }
        }

        function renderPartial($_searchString, $_path, $assignedValues = array())
        {
            if(!empty($_searchString))
            {
                if(file_exists($_path))
                {
                    $this->partialBuffer = file_get_contents($_path);

                    if(count($assignedValues) > 0)
                    {
                        foreach ($assignedValues as $key => $value)
                        {
                            $this->partialBuffer = str_replace('{'.strtoupper($key).'}', $value, $this->partialBuffer);
                        }
                    }
                    $this->tpl = str_replace('['.strtoupper($_searchString).']', $this->partialBuffer, $this->tpl);
                    $this->partialBuffer = '';
                }else
                {
                    echo "<b>Template Eror:</b> Partial file '{$_path}' Inclusion Error.";
                }
            }
        }

        function show($debug = false)
        {
            if(count($this->assignedValues) > 0)
            {
                foreach ($this->assignedValues as $key => $value)
                {
                    $this->tpl = str_replace('{'.$key.'}', $value, $this->tpl);
                }
            }
            if($debug)
            {
                $this->tpl .= '<!-- '.date('d.m.Y H:i:s').'-->';
            }
            return $this->tpl;
        }
    }