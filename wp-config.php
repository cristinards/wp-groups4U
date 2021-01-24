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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wp_gp4u' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'q1*uY!{6BD^[5{J O;Lo3|Qv-=1,[hMJu S}}hAre[)KQ|uE5(q|<#gd+iDKR5`e' );
define( 'SECURE_AUTH_KEY',  '],.q9?D:72ba!CPvh.(n^AmuiABlI-tb-+3_Wup^|4mz*svf-C7k Wsp2 e+[=6`' );
define( 'LOGGED_IN_KEY',    '~%3W+=Iy!BVCzhZcrtfBS!wKS3aULi<)oq3Q9*_u=~5*[?(Qo@JsN4pUa-5}-bdW' );
define( 'NONCE_KEY',        '4r6@F3n2Sdj!neIU8z[COPFKKPpJ^zn|*l7-B|itkf9o-U{xT:lAOO4FP&L[T(6e' );
define( 'AUTH_SALT',        '-MA.t@kT-`e_YwFG=A`3K{K[XiSkJB;*hXU==](pZ?~1r)TD*zkfd-9N+6xM?gmQ' );
define( 'SECURE_AUTH_SALT', 'sqqRWNpJfw%h:s>3NV-Sho!@*Q!&_~o0s+  ?*9s|=K-_&xR_M+ji$:o0c^W0K+$' );
define( 'LOGGED_IN_SALT',   '<~=f$EXUk)-:9:o#fCp;svx{yC0@UE4dtG@j]J95{s?%1F4:EDGCUj~n4~tVPb ^' );
define( 'NONCE_SALT',       ';S?ZX> p&Hr@)HH}1)c+U 1{(#k%amrbzFIg>)}HVOx)L&mZ-C`rBW(L#x>MD?H%' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
