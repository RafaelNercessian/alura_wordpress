<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'alura' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'u6Whe,u_d}A:HAbX<WGVRs<QgR)r6;a;mUL-P~jRIx@g3+[fXJK-]gMH8*!&N+0h' );
define( 'SECURE_AUTH_KEY',  'D7_(}2DsH]<^R=2UHF5)#M*BteUHSLl`OE#uVm??x0V}Yn$G#60.kT>e( 0(32{9' );
define( 'LOGGED_IN_KEY',    'p6 lx*gjaa,wuu0orr:jN3hDMdjD=$Xv_/~o6Ye{Uei~A:MaXh,k+t3sVJRvE7Nb' );
define( 'NONCE_KEY',        'kFuxuAMKnsE2)*;B<x}syxR9ePHKtCgGYKda;!lcO.ZhfM4+V!y*K>/u,rZtI[0I' );
define( 'AUTH_SALT',        '<4~P)dQARqvS~9{r{`| 39iL->4#g^y^CeI`hVFru&tq3~Z@*dPh3l8f-Mu*BH4|' );
define( 'SECURE_AUTH_SALT', 'hHG.um}]y?SU.^@vp_NC}nkK1J~?8#&VLFL*nN#{O:}oUGAT,mYM^Dv|:@uzbqD7' );
define( 'LOGGED_IN_SALT',   'rtRb.Z1ZE=VtW/G #]&=UA#2jjI5.S.}}`ZtEBKC,7Q<gjtX8H2NYu&kzQW.nv;8' );
define( 'NONCE_SALT',       'jnfdKFsJ^2:zBPlzD |gOlKnOJ@<AE]<SsVpMK%-r8]~N&I{:3_acg4?w**%0U>-' );
define( 'WPMS_ON', true );
define( 'WPMS_SMTP_PASS', 'cu2y12w287' );
/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
