<?php

class error {

    //error message generator
    public function errorMessage($type, $header, $text) {
        $placeholder = <<< EOT
<div class="alert alert-$type alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>$header</strong> $text
</div>
EOT;
        return $placeholder;
    }

}

?>