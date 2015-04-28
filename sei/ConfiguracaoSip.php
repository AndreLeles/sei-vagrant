<?

require_once dirname(__FILE__).'/Sip.php';

class ConfiguracaoSip extends InfraConfiguracao  {

 	private static $instance = null;

 	public static function getInstance(){
 	  if (ConfiguracaoSip::$instance == null) {
 	    ConfiguracaoSip::$instance = new ConfiguracaoSip();
 	  }
 	  return ConfiguracaoSip::$instance;
 	}

 	public function getArrConfiguracoes(){
 	  return array(
 	      'Sip' => array(
 	      	  // Endere�o de acesso � aplica��o SEI
 	          'URL' => 'http://localhost/sip',

 	          // Habilita melhorias de performance casa aplica��o esteja em produ��o
 	          'Producao' => false),
 	       
 	      'PaginaSip' => array(
 	          'NomeSistema' => 'SIP',
 	          'NomeSistemaComplemento' => 'v2.6.0'),

 	      'SessaoSip' => array(
 	          'SiglaOrgaoSistema' => 'ABC',
 	          'SiglaSistema' => 'SIP',
 	          'PaginaLogin' => 'http://localhost/sip/login.php',
 	          'SipWsdl' => 'http://localhost/sip/controlador_ws.php?servico=wsdl',
 	          'https' => false),
 	       
 	      'BancoSip'  => array(
 	          'Servidor' => getenv("DB_PORT_3306_TCP_ADDR"),
 	          'Porta' => getenv("DB_PORT_3306_TCP_PORT"),
 	          'Banco' => 'sip',
 	          'Usuario' => 'sip_user',
 	          'Senha' => 'sip_user',
 	          'Tipo' => 'MySql'), //MySql ou SqlServer),
 	       
 	      'HostWebService' => array(
 	          'Replicacao' => array('*'), //endere�o ou IP da m�quina que implementa o servi�o de replica��o de usu�rios
 	          'Pesquisa' => array('*'), //endere�os/IPs das m�quinas do SEI
 	          'Autenticacao' => array('*') //endere�os/IPs das m�quinas do SEI
 	          ), 
 	      
 	      'InfraMail' => array(
 	          'Tipo' => '1', //1 = sendmail (neste caso n�o � necess�rio configurar os atributos abaixo), 2 = SMTP
 	          'Servidor' => '[Servidor E-Mail]',
 	          'Porta' => '25',
 	          'Codificacao' => '8bit', //8bit, 7bit, binary, base64, quoted-printable
 	          'Autenticar' => false, //se true ent�o informar Usuario e Senha
 	          'Usuario' => '',
 	          'Senha' => '',
 	          'Protegido' => ''),  //campo usado em desenvolvimento, se tiver um email preenchido entao todos os emails enviados terao o destinatario ignorado e substitu�do por este valor (evita envio incorreto de email)
 	  ); 	  	
 	}
}
?>
