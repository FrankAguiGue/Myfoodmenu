<?php
require_once('conexion.php');
require_once(dirname(__FILE__) .'/simpletest/autorun.php');
require_once(dirname(__FILE__) .'/simpletest/web_tester.php');

class TestContact extends WebTestCase{
    function testContactPage(){
        $this->get('https://franciscoproyectos.000webhostapp.com/MyFoodMenu/login.html');
        $this->setField('mail','francisco.a.guevara1999@gmail.com');
        $this->setField('pas','125');
        $this->click('login');
        $this->assertResponse(401);
        
    }
    
}
?>