# Nette MojeOlomouc implementation

This is a simple integration of [moje-olomouc](https://github.com/Salamek/moje-olomouc) into [Nette Framework](http://nette.org/)

## Instalation

The best way to install salamek/nette-moje-olomouc is using  [Composer](http://getcomposer.org/):


```sh
$ composer require salamek/nette-moje-olomouc
```

Then you have to register extension in `config.neon`.

```yaml
extensions:
	mojeOlomouc: Salamek\MojeOlomouc\DI\MojeOlomoucExtension

mojeOlomouc:
    apiKey: YOUR_API_KEY
    isProduction: false
```
