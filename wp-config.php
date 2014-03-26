<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'xplanet');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'ch02896');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'F!|7yog.||e.@Vm`SKt<`{_ikwi|zqU}+)~B.7FcX0Hy[-|--{Z2%&c|u*ck6 gt');
define('SECURE_AUTH_KEY',  '24^)KCl|[~-!0K ;DB8+q-C$M]CaJ/-+z{3[bD1rT=1D- aNX,NT/;8vK.JP^U,t');
define('LOGGED_IN_KEY',    'dM>w]/}}3&zs}Xx^WM]jS[Cf#+=uy0Krg+rn/WS]^9DC[x4lq|nD[>CCI[?g.1QX');
define('NONCE_KEY',        'o|kv2MXfAM+$IO|:}af83kb<vJ=DxR|l$^ge]cSA{/-Q)UElOMoJ0iy(FG5lI`W-');
define('AUTH_SALT',        'i[ra`u1QF~`_qAb1Q,BYwoPbG=+Ss@rZ^~|q;V+ R^l[~UU-1R1?5^k&X}#$g|~l');
define('SECURE_AUTH_SALT', '.o!osTw:1ed.Z}9MY<?Ja*6UtLSUG|jnP4PnzlLQO0rq{<://cD!E:p1b?<e# -w');
define('LOGGED_IN_SALT',   'eXv;@}0!:z3219zH-_aS&YmObRx>H{L$@O&sS1Y*(?;f1eCd-5+t [g+0ZI&H-Ja');
define('NONCE_SALT',       'n~>$<ZKIkdnv^N+% xOOo%=|5ACTR>a)}A5_D},|Oam7#|=j4Gf4cYd&k;OA?.32');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'xp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
