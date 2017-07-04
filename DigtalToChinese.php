<?php
/*
数字转中文，财务开发可能会用到
 */
header("Content-type:text/html;charset=utf-8");
$nf = $formatter= new \NumberFormatter('zh', NumberFormatter::SPELLOUT);
$formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-cardinal-financial");
$n = 1234567.89;
var_dump($n, $nf->format($n));   //string '壹佰贰拾叁万肆仟伍佰陆拾柒点捌玖' (length=48)
                              

//SPELLOUT, 意思是拼写

//%spellout-cardinal-financial 意思是繁体中文财务用字

//打开intl扩展.


/*
遇到的问题   win  wamp开启intl扩展的时候    

php是 php5.5.12    php5.5.12\php.ini  查看 php_intl.dll 已开启  但是phpinfo()里面就是没有intl扩展

几经查询网上众说纷纭：
1. 把 php5.5.12\里面的icu**.dll  全部copy到apache/bin 目录下 然后重启  --》一共8个文件，我copy了，然后满怀信心的打开phpinfo(),继续很失望·· 
2.把php的执行目录添加到环境变量中---》继续失望

最后继续google ，发现了   <<解析wamp的php.ini设置不生效>> http://skytina.blog.51cto.com/6834539/1620112
这篇文章，发现 “那你得先了解php的两种运行运行环境，一个在命令终端上，一种是在服务器上（在这里还细分cgi,fast-cgi，web模块模式）！”

 当我们以脚本运行我们的php脚本的时候，比如我这里将wamp安装在D盘。在wamp中加载的d:\wamp\bin\php\php5.xx\php.ini；而在apache服务器运行的时候，则变成D:\wamp\bin\apache\Apache2.2.21\bin\php.ini，可以看到这两个方式加载的php.ini不一样！
           如果你实在找不到这两个，可以在安装wamp的盘符里面，进入wamp的文件夹，然后进行搜索'php.ini'。
          平常我们修改的是apache服务器上的php.ini。


  我去，居然一直以来都改错文件了，大骂自己几句：混蛋！ 
  然后intl 扩展 ok 了。
 */



