<?php
    class Message
    {
        protected $myUserMsg;
        protected $myHtmlOpen;
        protected $myHtmlClose;

        function __construct($userMsg)
        {
          $this->myUserMsg = $userMsg;
        }

        public function getUserMsg ()
        {
            return $this->myUserMsg;
        }

        public function setUserMsg ($userMsg)
        {
            $this->myUserMsg = $userMsg;
        }

        public function printUserMsg ()
        {
            $this->myHtmlString = "$this->myHtmlOpen" . $this->myUserMsg . "$this->myHtmlClose";
            return $this->myHtmlString;
        }
    }

    class ErrorMsg extends Message
    {
        protected $myHtmlOpen = '<div class="alert alert-danger" role="alert">';
        protected $myHtmlClose = '</div>';
    }

    class SuccessMsg extends Message
    {
        protected $myHtmlOpen = '<div class="alert alert-success" role="alert">';
        protected $myHtmlClose = '</div>';
    }
 ?>
