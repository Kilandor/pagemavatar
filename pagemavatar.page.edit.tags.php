<?php

/**
 * [BEGIN_COT_EXT]
 * Hooks=page.edit.tags
 * Tags=page.edit.tpl:{PAGEEDIT_FORM_MAVATARTITLE}, {PAGEEDIT_FORM_MAVATARFILE}, {PAGEEDIT_FORM_MAVATAR}, {PAGEEDIT_FORM_MAVATARDELETE}
 * [END_COT_EXT]
 */
/**
 * Pagemultiavatar for Cotonti CMF
 *
 * @version 2.00
 * @author  esclkm, graber
 * @copyright (c) 2011 esclkm, graber
 */
defined('COT_CODE') or die('Wrong URL');

require_once cot_langfile('pagemavatar');
require_once cot_incfile('pagemavatar', 'plug');
$mav_files = cot_getpagemavatars($id);
$i = 1;
foreach ($mav_files as $key => $val)
{
	$mav_file = (isset($mav_files[$key]['path']) ? $mav_files[$key]['path'] : '');

	$t->assign(array(
		'PAGEEDIT_FORM_MAVATARTITLE' => $L['mavatar_file'] . " " . $i,
		'PAGEEDIT_FORM_MAVATARDESC' => $mav_files[$key]['desc'],
		'PAGEEDIT_FORM_MAVATARFILE' => $mav_file,
		'PAGEEDIT_FORM_MAVATAR' => cot_inputbox('file', 'pagemavatar[' . $key . ']', '', 'class="mavfile" size="20"', 'pagemavatar_input_file'),
		'PAGEEDIT_FORM_MAVATARDESC_INPUT' => cot_inputbox('text', 'pagemavatardesc[' . $key . ']', $mav_files[$key]['desc'], 'class="mavdesc" size="20"'),
		'PAGEEDIT_FORM_MAVATARKEY_INPUT' => cot_inputbox('text', 'pagemavatarkey[' . $key . ']', $mav_files[$key]['key'], 'class="mavkey" size="20"'),
		'PAGEEDIT_FORM_MAVATARDELETE' => cot_radiobox(0, 'rpagemavatardelete[' . $key . ']', array(1, 0), array($L['Yes'], $L['No']))
	));
	$t->parse('MAIN.PAGEMAVATAR_ROW');
	$i++;
}
for ($i; $i <= $cfg['plugin']['pagemavatar']['items']; $i++)
{
	$t->assign(array(
		'PAGEEDIT_FORM_MAVATARTITLE' => $L['mavatar_file'] . " " . $i,
		'PAGEEDIT_FORM_MAVATAR' => cot_inputbox('file', 'pagemavatar[]', '', 'class="mavfile" size="20"', 'pagemavatar_input_file'),
		'PAGEEDIT_FORM_MAVATARDESC_INPUT' => cot_inputbox('text', 'pagemavatardesc[]', '', 'class="mavdesc" size="20"'),
		'PAGEEDIT_FORM_MAVATARKEY_INPUT' => cot_inputbox('text', 'pagemavatarkey[]', '', 'class="mavkey" size="20"'),
		'PAGEEDIT_FORM_MAVATARDESC' => '',
		'PAGEEDIT_FORM_MAVATARFILE' => '',
		'PAGEEDIT_FORM_MAVATARDELETE' => ''
	));
	$t->parse('MAIN.PAGEMAVATAR_ROW');
}
$t->assign(array(
	'PAGEEDIT_FORM_MAVATAR' => cot_rc('pagemavatar_add_ajax', array(
		'input_file' => cot_inputbox('file', 'pagemavaar[]', '', 'class="mavfile" size="20"', 'pagemavatar_input_file'),
		'input_desc' => cot_inputbox('text', 'pagemavatardesc[]', '', 'class="mavdesc" size="20"'),
		'input_keys' => cot_inputbox('text', 'pagemavatarkey[]', '', 'class="mavkey" size="20"')
	))
));
?>