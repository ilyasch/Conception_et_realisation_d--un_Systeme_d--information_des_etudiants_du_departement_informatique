<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "L'attribut doit être accepted.",
	"active_url"           => "L'attribut n'est pas un URL valide.",
	"after"                => "L'attribut doit être une date prochaine :date.",
	"alpha"                => "L'attribut doit contenir seulement letters.",
	"alpha_dash"           => "L'attribut doit contenir seulement lettres, nombres et tirets.",
	"alpha_num"            => "L'attribut doit contenir seulement lettres and nombres.",
	"array"                => "L'attribut doit être un tableau.",
	"before"               => "L'attribut doit être a date before :date.",
	"between"              => [
		"numeric" => "L'attribut doit être entre :min and :max.",
		"file"    => "L'attribut doit être entre :min and :max kilobytes.",
		"string"  => "L'attribut doit être entre :min and :max characters.",
		"array"   => "L'attribut doit être entre :min and :max items.",
	],
	"boolean"              => "L'attribut doit être vrai ou faux.",
	"confirmed"            => "L'attribut de confirmation ne correspond pas.",
	"date"                 => "Entrer une date valide.",
	"date_format"          => "L'attribut n'a pas la forme :format.",
	"different"            => "L'attribut et :other doivent être different.",
	"digits"               => "L'attribut doit être :entiers digits.",
	"digits_between"       => "L'attribut doit être entre :min and :max digits.",
	"email"                => "L'attribut doit être a valid email address.",
	"filled"               => "L'attribut field is required.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => "L'attribut doit être an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "L'attribut doit être an integer.",
	"ip"                   => "L'attribut doit être a valid IP address.",
	"max"                  => [
		"numeric" => "L'attributne doit pas être supérieur à  :max.",
		"file"    => "L'attributne doit pas être supérieur à  :max kilobytes.",
		"string"  => "L'attributne doit pas être supérieur à  :max characters.",
		"array"   => "L'attribut may not have more than :max items.",
	],
	"mimes"                => "L'attribut doit être a file of type: :values.",
	"min"                  => [
		"numeric" => "L'attribut doit être at least :min.",
		"file"    => "L'attribut doit être at least :min kilobytes.",
		"string"  => "L'attribut doit être at least :min characters.",
		"array"   => "L'attribut must have at least :min items.",
	],
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "L'attribut doit être a number.",
	"regex"                => "L'attribut format is invalid.",
	"required"             => "L'attribut field is required.",
	"required_if"          => "L'attribut est requis quand :other is :value.",
	"required_with"        => "L'attribut est requis quand :values is present.",
	"required_with_all"    => "L'attribut est requis quand :values is present.",
	"required_without"     => "L'attribut est requis quand :values is not present.",
	"required_without_all" => "L'attribut est requis quand none of :values are present.",
	"same"                 => "L'attribut and :other must match.",
	"size"                 => [
		"numeric" => "L'attribut doit être :size.",
		"file"    => "L'attribut doit être :size kilobytes.",
		"string"  => "L'attribut doit être :size characters.",
		"array"   => "L'attribut must contain :size items.",
	],
	"unique"               => "L'attribut has already been taken.",
	"url"                  => "L'attribut format is invalid.",
	"timezone"             => "L'attribut doit être a valid zone.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

];
