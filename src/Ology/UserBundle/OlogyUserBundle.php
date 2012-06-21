<?php

namespace Ology\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OlogyUserBundle extends Bundle {

    public function getParent() {
        return 'FOSUserBundle';
    }

}
