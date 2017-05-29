<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


/**
 * Lithuanian strings for comlogo
 *
 * @package    mod_comlogo
 * @copyright  2017 Viktor Juša <viktor.jusa@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['modulename'] = 'Comenius Logo';
$string['modulenameplural'] = 'Comenius Logos';
$string['modulename_help'] = 'Use the comlogo module for... | The comlogo module allows...';
$string['comlogo:addinstance'] = 'Add a new comlogo';
$string['comlogo:submit'] = 'Submit comlogo';
$string['comlogo:view'] = 'View comlogo';
$string['comlogofieldset'] = 'Auto grading system';
$string['comlogoname'] = 'Comenius Logo activity';
$string['comlogoname_help'] = 'This is the content of the help tooltip associated with the comlogoname field. Markdown syntax is supported.';
$string['comlogo'] = 'Comenius Logo';
$string['description'] = 'Description';
$string['pluginadministration'] = 'comlogo administration';
$string['pluginname'] = 'comlogo';
$string['submissions'] = 'Submissions';
$string['drawpage'] = 'Draw page';
$string['autograde']= 'Autograde';
$string['autograder']= 'Autograde';
$string['author']= 'Submitted by';
$string['submittedon']= 'Submitted on';
$string['grader']= 'Graded by';
$string['grade']= 'Grade submission';
$string['gradedon']= 'Graded on';
$string['userimg']= 'Submited image';
$string['codelog']= 'Code executed';
$string['run']= 'Run';
$string['stop']= 'Stop';
$string['clear']= 'Clear';
$string['submit']= 'Submit';
$string['entercommand']= 'Enter code here';
$string['nogradercapability'] = 'You don\'t have permission to grade submissions.';
$string['nosubmission'] = 'No submission';
$string['helppage']= 'Help page';
$string['teachercode']= 'Answer code';
$string['submissionfailed']= 'Submission failed, try again.';
$string['submissionsuccess']= 'Submission successful.';
$string['submissiongraded']= 'Submission graded: ';
$string['submissionwait']= 'Waiting for teacher to grade.';
$string['helpcontent1'] = '<div class="reff">
    <a href="#Toc1"> <span>Aritmetinės operacijos ir funkcijos</span></a>
    <a href="#Toc2"> <span>Lyginimo operacijos ir funkcijos</span></a>
    <a href="#Toc3"> <span>Veiksmai su žodžiais ir sąrašais</span></a>
    <a href="#Toc4"> <span>Įvestis</span></a>
    <a href="#Toc5"> <span>Loginiai veiksmai ir loginiai žodžiai</span></a>
    <a href="#Toc6"> <span>Kintamųjų įvardijimas ir vartojimas</span></a>
    <a href="#Toc7"> <span>Darbas su procedūrų tekstais</span></a>
    <a href="#Toc8"> <span>Valdymo ir sąlyginės procedūros</span></a>
    <a href="#Toc9"> <span>Vėžliuko geometrija</span></a>
</div>

<div class="info">
    <h2 id="Toc1">Aritmetinės operacijos ir funkcijos</h2>
    <div class="block">
        <p><em>skaičius1</em>&nbsp;<strong>*</strong>&nbsp;<em>skaičius2</em> - skaičiuojama dviejų argumentų sandauga</p></p>
        <p><em>skaičius1</em>&nbsp;<strong>-</strong>&nbsp;<em>skaičius2</em> - skaičiuojamas skaičių <em>skaičius1</em> ir <em>skaičius2</em> skirtumas</p>
        <p><em>skaičius1</em>&nbsp;<strong>+</strong>&nbsp;<em>skaičius2</em> - skaičiuojama dviejų argumentų <em>skaičių </em>suma</p>
        <p><em>skaičius1</em>&nbsp;<strong>/</strong>&nbsp;<em>skaičius2</em> Rezultatas&nbsp;&ndash; <em>skaičius1</em> padalytas i&scaron; <em>skaičius2</em></p>
        <p><strong>suma</strong> <em>skaičius1 skaičius2 </em>Pateikia dviejų skaičių sumą. Jeigu yra daugiau arba mažiau nei du argumentai, tai visą komandą (kartu su visais jos argumentais) reikia apskliausti paprastais skliaustais.</p>
        <p><strong>skirtumas </strong><em>skaičius1 skaičius2 </em>Funkcijos rezultatas yra skaičių skaičius1 ir skaičius2 skirtumas.</p>
        <p><strong>sandauga </strong><em>skaičius1 skaičius2 </em>Pateikia dviejų argumentų sandaugą. Ra&scaron;ant daugiau (ar mažiau) kaip du argumentus visą komandą turime apskliausti.</p>
        <p><strong>koeficientas</strong> <em>skaičius1 skaičius2 </em>Pateikia <em>skaičiaus1</em> dalmenį<em> i&scaron; </em><em>skaičiaus2</em>.</p>
        <p><strong>liekana </strong><em>skaičius1 skaičius2 </em>Pateikia argumentų dalybos sveikųjų skaičių tikslumo liekaną.</p>
        <p><strong>exp</strong> <em>skaičius </em>Rezultatas&nbsp;&ndash; <strong>iracionalusis skaičius</strong> e = 2.718281..., pakeltas nurodytu laipsniu: <em>skaičius</em>.</p>
        <p><strong>&scaron;aknis </strong><em>skaičius </em>Pateikia argumento kvadratinę &scaron;aknį.</p>
        <p><strong>log10 </strong><em>skaičius </em>Apskaičiuoja argumento <em>skaičius</em> logaritmą (t.&nbsp;y. logaritmą, kurio pagrindas 10 ).</p>
        <p><strong>ln</strong> <em>skaičius </em>Apskaičiuoja natūralųjį argumento <em>skaičius</em> logaritmą (t.&nbsp;y. logaritmą, kurio pagrindas e&nbsp;=&nbsp;2.71828... ).</p>
        <p><strong>arctg</strong> <em>kampas</em> Rezultatas&nbsp;&ndash; <em>kampas</em> (laipsniais), kurio tangentas lygus argumentui skaičius. Rezultatas kampas visada bus tarp -90 ir 90.</p>
        <p><strong>sin</strong> <em>kampas</em> Pateikia nurodyto <em>kampo</em> (laipsniais) sinusą.</p>
        <p><strong>cos</strong> <em>kampas </em> Rezultatas&nbsp;&ndash; argumento <em>kampo</em> (duoto laipsniais) kosinusas.</p>
        <p><strong>tg</strong> <em>kampas</em> Rezultatas&nbsp;&ndash; tangentas nurodyto <em>kampo</em> (kampą reikia nurodyti laipsniais). Komanda neturi prasmės, kai argumentas lygus 90&nbsp;+&nbsp;i *&nbsp;180 (kur i&nbsp;&ndash; sveikasis skaičius).</p>
        <p><strong>apvalink </strong><em>skaičius</em> Pateikia artimiausią nurodytam skaičiui sveikąjį skaičių.</p>
        <p><strong>bet.koks</strong> <em>skaičius </em>Pateikia bet kokį sveiką skaičių tarp 0 ir <em>skaičius </em>&ndash; 1, imtinai.</p>
    </div>
    <h2 id="Toc2">Lyginimo operacijos ir funkcijos</h2>
    <div class="block">
        <p><em>skaičius1&nbsp;</em><strong>&lt;</strong><em>&nbsp;skaičius2</em> Rezultatas tiesa, jeigu <em>skaičius1</em> mažesnis už <em>skaičius2</em>. Prie&scaron;ingu atveju rezultatas melas.</p>
        <p><em>skaičius1&nbsp;</em><strong>&lt;=</strong><em>&nbsp;skaičius2</em> Rezultatas tiesa, jeigu <em>skaičius1</em> mažesnis arba lygus <em>skaičius2</em>. Prie&scaron;ingu atveju rezultatas melas.</p>
        <p><em>skaičius1&nbsp;</em><strong>&gt;</strong><em>&nbsp;skaičius2</em> Rezultatas tiesa, jeigu <em>skaičius1</em> didesnis už <em>skaičius2</em>. Prie&scaron;ingu atveju rezultatas melas.</p>
        <p><em>skaičius1&nbsp;</em><strong>&gt;=</strong><em>&nbsp;skaičius2</em> Rezultatas tiesa, jeigu <em>skaičius1</em> didesnis arba lygus <em>skaičius2</em>. Prie&scaron;ingu atveju rezultatas melas.</p>
        <p><em>skaičius1&nbsp;</em><strong>&lt;&gt;</strong><em>&nbsp;skaičius2</em> Rezultatas tiesa, jeigu pirmasis argumentas skiriasi nuo antrojo. Prie&scaron;ingu atveju rezultatas melas.</p>
        <p><em>skaičius1&nbsp;</em><strong>=</strong><em>&nbsp;skaičius2</em> Jeigu abu argumentai yra <em>skaičiai</em>, tai rezultatas yra arba tiesa, arba melas priklausomai, ar jie lygūs, ar ne.</p>
        <p><strong>mažesnis? </strong><em>skaičius1 skaičius2 </em>Rezultatas tiesa, jei <em>skaičius1</em> yra mažesnis negu <em>skaičius2</em><em>,</em> kitaip rezultatas melas.</p>
        <p><strong>didesnis? </strong><em>skaičius1 skaičius2 </em>Rezultatas tiesa, jei <em>skaičius1</em> yra didesnis negu <em>skaičius2</em><em>,</em> kitaip rezultatas melas.</p>
        <p><strong>lygūs? </strong><em>bet_kas1 bet_kas2 </em>Rezultatas tiesa, jei abu argumentai yra identi&scaron;ki žodžiai<em>,</em> kitaip rezultatas melas.</p>
    </div>
    <h2 id="Toc3">Veiksmai su žodžiais ir sąrašais</h2>
    <div class="block">
        <p>[<em>bet_kas1&nbsp;bet_kas2 ...</em>] Sąra&scaron;as</p>
        <p><strong>&ldquo;</strong><em>žodis</em></p>
        <p><strong>gauk.sakinį</strong><strong>/gks </strong><em>bet_kas1&nbsp;bet_kas2</em> Rezultatas &ndash; &scaron;itokiu būdu sukonstruotas sąra&scaron;as: jeigu visi argumentai yra sąra&scaron;ai, jų nariai sujungiami į vieną sąra&scaron;ą.</p>
        <p><strong>dėk.pirmu</strong><strong>/dpr </strong><em>bet_kas</em><em>&nbsp;sąra&scaron;as</em> Jeigu antrasis argumentas yra sąra&scaron;as, funkcija dėk.pirmu pateikia pakeistą <em>sąra&scaron;ą</em>, kurio pirmas narys yra <em>bet_kas</em>.</p>
        <p><strong>dėk.paskutinų</strong><strong>/dps dpr </strong><em>bet_kas</em><em>&nbsp;sąra&scaron;as</em> Jeigu antrasis argumentas yra <em>sąra&scaron;as</em>, funkcijos dėk.paskutinų rezultatas yra modifikuotas <em>sąra&scaron;as</em>, kurio narys paskutinis yra <em>bet_kas</em>.</p>
        <p><strong>pirmas </strong><em>bet_kas</em> Jeigu argumentas yra <em>žodis</em>, funkcija pirmas pateiks tik pirmąjį žodžio simbolį (bet tai taip pat yra žodis). Jeigu argumentas yra <em>sąra&scaron;as</em>, funkcija pirmas pateiks jo pirmąjį narį.</p>
        <p><strong>paskutinis </strong><em>bet_kas</em> Jeigu argumentas yra <em>žodis</em>, tai funkcijos paskutinis rezultatas yra <em>žodis</em>, turintis tik paskutinę raidę. Jeigu argumentas yra sąra&scaron;as, tai funkcijos paskutinis rezultatas yra jo paskutinis narys.</p>
        <p><strong>be.pirmo</strong><strong>/bpr </strong><em>bet_kas</em>Jeigu argumentas yra <em>žodis</em>, tai funkcijos be.pirmo rezultatas yra duotas <em>žodis</em>, atmetus pirmąją raidę. Jeigu argumentas yra <em>sąra&scaron;as</em>, tai funkcijos be.pirmo rezultatas yra duotas sąra&scaron;as be pirmojo nario.</p>
        <p><strong>be.pirmų</strong><strong>/bprm </strong><em>bet_kas</em> Kai yra sąra&scaron;ų sąra&scaron;as, gražina pirmą jos narį</p>
        <p><strong>be.paskutinio</strong><strong>/bps </strong><em>bet_kas</em><em>&nbsp;sąra&scaron;as</em> be.paskutinio rezultatas būtų lygus pradiniam duomeniui sąra&scaron;as.</p>
        <p><strong>dalis </strong><em>skaičius bet_kas</em> Jeigu pirmasis argumentas yra <em>skaičius</em>, funkcija dalis pateikia tą antrojo argumento narį, kurio numeris lygus pirmajam argumentui. Jeigu antrasis argumentas yra <em>sąra&scaron;as</em>, tai rezultatas bus tas jo narys, kurio numeris lygus pirmajam argumentui <em>skaičius</em>. Jeigu antrasis argumentas yra <em>žodis</em>, tai rezultatas bus ta jo raidė, kurios numeris lygus pirmajam argumentui skaičius.</p>
        <p><strong>pasirink </strong><em>bet_kas</em> Čia <em>bet_kas</em> negali būti tu&scaron;čias <em>sąra&scaron;as</em>. Funkcija pateikia atsitiktinai pasirinktą <em>sąra&scaron;o bet_kas </em>narį.</p>
        <p><strong>žodis? </strong><em>bet_kas</em> Pateiks rezultatą tiesa, jei argumentas bus <em>žodis</em>, t.&nbsp;y. simbolių ar skaitmenų (skaičius) seka. Visais kitais atvejais rezultatas bus melas.</p>
        <p><strong>sąra&scaron;as? </strong><em>bet_kas</em> Rezultatas tiesa, jeigu argumentas yra <em>sąra&scaron;as</em>. Kitaip rezultatas <em>melas</em>.</p>
        <p><strong>skaičius? </strong><em>bet_kas</em> Rezultatas lygus tiesa, jei <em>bet_kas</em> yra <em>skaičius</em>, t.&nbsp;y. žodis, sudarytas i&scaron; skaitmenų. Kitaip rezultatas lygus melas.</p>
        <p><strong>tu&scaron;čias?/tu&scaron;čia? </strong><em>bet_kas</em> Rezultatas bus tiesa, jeigu <em>bet_kas</em> yra tu&scaron;čias žodis, tu&scaron;čias <em>sąra&scaron;as</em>. Visais kitais atvejais rezultatas bus melas.</p>
        <p><strong>keisk </strong><em>skaičius sąra&scaron;as bet_kas</em> Jeigu pirmas argumentas yra <em>skaičius</em>, tai funkcija keisk rezultatu pateikia antrąjį argumentą, kuriame skaičiumi nurodytas narys yra pakeistas trečiuoju argumentu.</p>
        <p><strong>ženklas </strong><em>skaičius</em> Čia <em>skaičius</em> yra sveikasis skaičius i&scaron; intervalo [0;&nbsp;255]. Rezultatas yra ženklas, kurio ASCII kodas atitinka duotą <em>skaičių</em>.</p>
    </div>
    <h2 id="Toc4">Įvestis</h2>
    <div class="block">
        <p><strong>ra&scaron;yk/rodyk </strong><em>bet_kas</em> Ra&scaron;o į i&scaron;vesties srautą.</p>
    </div>
    <h2 id="Toc5">Loginiai veiksmai ir loginiai žodžiai</h2>
    <div class="block">
        <p><strong>tiesa</strong> Jis duoda loginę reik&scaron;mę tiesa.</p>
        <p><strong>melas</strong> Jis duoda loginę reik&scaron;mę melas.</p>
        <p><em>loginė_reik&scaron;mė1</em> <strong>ir </strong><em>loginė_reik&scaron;mė2 </em>Loginis ir operatorius, gražina tiesa, kai vieną reik&scaron;mių yra tiesa.</p>
        <p><em>loginė_reik&scaron;mė1</em> <strong>arba </strong><em>loginė_reik&scaron;mė2 </em>Loginis arba operatorius, gražina tiesa, kai abi reik&scaron;mės yra tiesa. </p>
        <p><strong>prie&scaron;ingai </strong><em>loginė_reik&scaron;mė</em> Rezultatas lygus tiesa, jeigu argumentas melas, arba lygus melas, jeigu argumentas tiesa.</p>
        <p><em>loginė_reik&scaron;mė1</em> <strong>xor</strong> <em>loginė_reik&scaron;mė2 </em>Loginis xor operatorius, gražina tiesa, kai abi reik&scaron;mės yra tiesa arba melas.</p>
    </div>
    <h2 id="Toc6">Kintamųjų įvardijimas ir vartojimas</h2>
    <div class="block">
        <p><strong>tebus </strong><em>žodis&nbsp;bet_kas</em> Apra&scaron;o kintamąjį vardu <em>žodis </em>ir priskiria jam reik&scaron;mę, lygią antrajam argumentui.</p>
        <p><strong>vardu </strong>Visų <em>vidinių kintamųjų </em>vardai.</p>
        <p><strong>:</strong><em>kintamasis</em></p>
    </div>
    <h2 id="Toc7">Darbas su procedūrų tekstais</h2>
    <div class="block">
        <p><strong>apra&scaron;ytas?/vardas? </strong><em>žodis </em>Jeigu <em>žodis</em> yra vartotojo apra&scaron;yta procedūra, tai rezultatas bus tiesa. Visais kitais atvejais rezultatas bus melas.</p>
        <p><strong>apra&scaron;yk </strong><em>žodis&nbsp;apra&scaron;as </em>Apra&scaron;oma procedūra, kur žodis yra procedūros vardas, o <em>apra&scaron;as</em>&nbsp;&ndash; procedūros tekstas.</p>
        <p><strong>komanda? </strong><em>žodis</em> Pateikia tiesa, jeigu įvestas žodis yra Logo komanda, tai yra, jeigu jis priklauso pradinių Logo kalbos procedūrų sąra&scaron;ui. Prie&scaron;ingu atveju pateikia melas.</p>
        <p><strong>tai </strong><em>žodis Žodis </em>apra&scaron;o naujos procedūros vardą, kiti duomenys<em> :duomuo1, :duomuo2 </em>ir t.&nbsp;t.. apibrėžia naujos procedūros argumentus. Eilutėse, einančiose po komandos tai, apra&scaron;oma procedūra. Atkreipkite dėmesį į tai, kad procedūros apra&scaron;ymo metu galimos tik eilutės redagavimo komandos. Procedūros apra&scaron;ą pabaigsite atskiroje eilutėje surinkę žodį ta&scaron;kas.</p>
    </div>
    <h2 id="Toc8">Valdymo ir sąlyginės procedūros</h2>
    <div class="block">
        <p><strong>vykdyk </strong><em>komandų_sąra&scaron;as</em> Komanda vykdyk įvykdo visą nurodytą <em>komandų sąra&scaron;ą</em>. Komanda efektingai vartojama užra&scaron;ant jos argumentų sąra&scaron;ą.</p>
        <p><strong>kartok </strong><em>skaičius&nbsp;komandų_sąra&scaron;as</em> Vykdo <em>komandų sąra&scaron;ą</em> nurodytą <em>skaičių</em> kartų. Jeigu pirmas komandos kartok argumentas yra mažesnis už vienetą, tai komandų sąra&scaron;as nebus įvykdytas. Jeigu nurodytas skaičius nėra sveikasis, tai pirmiausia bus atmetama jo trupmeninė dalis. Komanda kartok gali būti vartojama kitoje kartok komandoje ir t.&nbsp;t.</p>
        <p><strong>jei </strong><em>loginė_reik&scaron;mė</em><em> sąra&scaron;as1 </em>Komanda jei ir funkcija jei skiriasi savo antruoju ir trečiuoju argumentu. Jei jie yra komandų sąra&scaron;ai, tai jei taip pat yra komanda. Jeigu antrasis ir trečiasis argumentai yra rei&scaron;kiniai, kuriuos apskaičiavus gaunamas rezultatas, tai visa jei taip pat duos rezultatą ir todėl laikoma funkcija. Jei konstrukcija jei vartojama kaip funkcija, tai nė vienas jos argumentas negali būti tu&scaron;čias sąra&scaron;as.</p>
        <p><strong>jei.melas</strong> <em>loginė_reik&scaron;mė</em><em> sąra&scaron;as1 </em>Tas pats kas ir jei funkcija, tik kad atlieka tol kol yra melas.</p>
        <p><strong>jei.tiesa</strong><em> loginė_reik&scaron;mė sąra&scaron;as1</em> Tas pats kas ir jei funkcija.</p>
        <p><strong>baik </strong>Sustabdomas vykdomos procedūros darbas ir valdymas grįžta į tą procedūrą, kuri kreipėsi į sustabdytąją. Jeigu tokios procedūros nėra, valdymas grįžta į vir&scaron;utinį lygmenį, t.&nbsp;y. į dialogą su vartotoju. Komanda baik gali būti vykdoma tik <em>vartotojo apra&scaron;ytoje procedūroje</em>.</p>
        <p><strong>ciklas </strong><em>[žodis&nbsp;N1 N2&nbsp;] komandų_sąra&scaron;as</em> Pirmiausia, tarkime, kad <em>N1&nbsp;&lt;&nbsp;N2</em>. Kintamajam <em>žodis </em>priskiriama <em>N1</em> reik&scaron;mė ir yra įvykdomas <em>komandų_sąra&scaron;as</em>. Tada kintamasis <em>žodis</em> padidėja vienetu (jei nėra nurodytas <em>N3</em>; prie&scaron;ingu atveju prie žodžio pridedama <em>N3 </em>reik&scaron;mė) ir vėl įvykdomas <em>komandų_sąra&scaron;as</em>. &Scaron;is procesas kartojamas kol kintamojo žodis reik&scaron;mė tampa didesnė už <em>N2</em> reik&scaron;mę. pvz.:<strong> ciklas </strong><em>[ a 1 10 ]</em> <em>[ </em><strong>rodyk</strong><em> :a ]</em></p>
        <p><strong>kol </strong><em>[sakiniai] sąlyga</em> pvz.:<strong> kol </strong>[ <strong>tebus</strong> "a <strong>bet.koks</strong> 10 <strong>rodyk</strong> <em>:a</em> ] :a &lt; 8</p>
        <p><strong>kiekvienam </strong><em>žodis bet_kas komandų_sąra&scaron;as</em> Argumento <em>bet_kas</em> pirmas elementas (ženklas, jei tai yra žodis; narys, jei tai yra sąra&scaron;as; kadras, jei tai yra kaukė) yra priskiriamas kintamajam žodis ir įvykdomas <em>komandų_sąra&scaron;as</em>. Tada antras argumento <em>bet_koks</em> elementas yra priskiriamas kintamajam žodis ir įvykdomas <em>komandų_sąra&scaron;as</em>, ... ir t.&nbsp;t. kiekvienam <em>bet_kas</em> elementui.</p>
        <p><strong>filtras </strong><em>procedūrinis_objektas</em><em> sąra&scaron;as </em>Čia <em>procedūrinis_objektas</em>&ndash; vieno argumento funkcija, kurios rezultatas yra tiesa arba melas. Funkcija taiko<em> procedūrinį_objektą </em>kiekvienam <em>sąra&scaron;o</em> nariui ir pateikia sąra&scaron;ą tų narių, kurie patenkina <em>procedūrinio_objekto</em> sąlygą.</p>
    </div>
    <h2 id="Toc9">Vėžliuko geometrija</h2>
    <div class="block">
        <p><strong>priekin/pr </strong><em>skaičius</em> Perkelia Vėžliuką nurodytą žingsnelių (t.&nbsp;y. pikselių) <em>skaičių</em> jų žvelgimo kryptimi.</p>
        <p><strong>atgal/at </strong><em>skaičius</em> Vėžliukas paeina nurodytą žingsnių (t.&nbsp;y. ta&scaron;kelių&nbsp;&ndash; pikselių) <em>skaičių</em> prie&scaron;inga kryptimi negu jie žvelgia, kitaip sakant&nbsp;&ndash; atgal. Jeigu aktyvus Vėžliukas matomas?, jo kaukė yra matoma iki ir po ėjimo.</p>
        <p><strong>kairėn/kr </strong><em>kampas</em> Priverčia Vėžliuką pasisukti kairėn (pagal laikrodžio rodyklę) nurodytu <em>kampu</em> (i&scaron;reik&scaron;tu laipsniais).</p>
        <p><strong>de&scaron;inėn/d&scaron; kampas </strong>Vėžliukas pasisuka į de&scaron;inę (t.&nbsp;y. laikrodžio rodyklės kryptimi) nurodytu <em>kampu</em> (i&scaron;reik&scaron;tu laipsniais).</p>
        <p><strong>eik.į</strong> <em>ta&scaron;kas</em> (ta&scaron;kas [X Y]) Perkelia Vėžliuką į nurodytą ta&scaron;ką. Komanda eik.į nepakeičia Vėžliuko krypties. Jeigu Vėžliuko pie&scaron;tukas yra pie&scaron;im režime, tai jis nubrė&scaron; liniją iki naujos savo vietos.</p>
        <p><strong>eik.x.y</strong> <em>skaičius1&nbsp;skaičius2</em> Perkelia Vėžliuką į vietą, kurios X koordinatę nusako <em>skaičius1</em>, Y&nbsp;&ndash; <em>skaičius2</em>. eik.x.y nepakeičia aktyvaus Vėžliuko krypties. Jeigu Vėžliuko pie&scaron;tukas yra pie&scaron;im režime, tai jis nubrė&scaron; liniją iki naujos savo vietos.</p>
        <p><strong>eik.x</strong><strong> skaičius </strong>Perkelia Vėžliuką horizontaliai jo buvimo vietos į naują X koordinatę, nurodytą žingsnių <em>skaičių</em>. Komanda eik.x nepakeičia Vėžliuko krypties ar jo Y koordinatės. Jeigu jo pie&scaron;tukas yra pie&scaron;im režime, tai Vėžliukas nubrė&scaron; liniją judėdamas į naują X koordinatę.</p>
        <p><strong>eik.y</strong><strong> skaičius </strong>Perkelia Vėžliuką horizontaliai jo buvimo vietos į naują Y koordinatę, nurodytą žingsnių <em>skaičių</em>. Komanda eik.y nepakeičia Vėžliuko krypties ar jų X koordinatės. Jeigu jų pie&scaron;tukas yra pie&scaron;im režime, tai Vėžliukas nubrė&scaron; liniją judėdamas į naują Y koordinatę.</p>
        <p><strong>namo </strong>Vėžliuką grąžina į pradinę padėtį t.y. pie&scaron;imo lango vidurį.</p>
        <p><strong>koks.x.y</strong> Pateikia ta&scaron;ko, kuriame yra Vėžliukas koordinates [X&nbsp;Y]. Koordinačių plok&scaron;tuma prasideda Vėžliuko lauko centre (ta&scaron;ke, kuriame, atvėrę &bdquo;Komenskio Logo programą, randame Vėžliuką).</p>
        <p><strong>koks.x</strong> Pateikia Vėžliuko padėties X koordinatę.</p>
        <p><strong>koks.y</strong> Pateikia Vėžliuko padėties Y koordinatę.</p>
        <p><strong>rodykis </strong>Komanda ekrane parodo Vėžliuką.</p>
        <p><strong>slėpkis </strong>Komanda ekrane paslepią Vėžliuką.</p>
        <p><strong>valyk.viską</strong> I&scaron;valo visus Atmintinės objektus ir pie&scaron;imo langą.</p>
        <p><strong>valyk </strong>I&scaron;valo Vėžliuko lauką, t.&nbsp;y. nuspalvina jį esama fono spalva<strong>.</strong></p>
        <p><strong>nuspalvink </strong><em>spalva(ang.zodis)</em> <em>[komandos]</em> pvz.:<strong> nuspalvink </strong>"red [ <strong>kartok</strong> 4 [ <strong>pr</strong> 100 <strong>d&scaron;</strong> 90 ] ]</p>
        <p><strong>ra&scaron;tas </strong>Pateikia Vėžliuko esamo pie&scaron;tuko ra&scaron;to numerį.</p>
        <p><strong>teksto.dydis</strong> <em>skaičius</em> Nustato teksto dydį.</p>
        <p><strong>eisim/es </strong>&Scaron;i komanda paruo&scaron;ia Vėžliuką eiti, t.&nbsp;y. pakelia jo pie&scaron;tukus. Nuo Vėžliukas judėdamas Vėžliuko lauke nepie&scaron; linijos.</p>
        <p><strong>pie&scaron;im/p&scaron; </strong>&Scaron;i komanda paruo&scaron;ia Vėžliuką pie&scaron;ti, t.&nbsp;y. nuleidžia jo pie&scaron;tukus. Nuo &scaron;iol Vėžliukas pie&scaron; liniją (i&scaron; anksto pasirinkta spalva, pie&scaron;tuko storiu ir ra&scaron;tu), kai tik jis judės Vėžliuko lauke.</p>
        <p><strong>pasirink.pie&scaron;tuko.spalvą</strong><strong>/ppsp </strong><em>spalva</em></p><p> <img src="';
$string['helpcontent2'] = '"></p>
        <p><strong>pasirink.pie&scaron;tuko.storį</strong><strong>/pps </strong><em>pie&scaron;tuko_storis</em></p><p><img src="';
$string['helpcontent3'] = '"></p>
        <p><strong>pie&scaron;tuko.storis</strong> Pateikia Vėžliuko pie&scaron;tuko storį.</p>
        <p><strong>pie&scaron;tuko.spalva</strong><strong>/ps </strong>Pateikia Vėžliuko pie&scaron;tuko spalvą.</p>
        <p><strong>matomas? </strong>Pateikia tiesa jeigu Vėžliukas yra matomas pie&scaron;imo lange. Prie&scaron;ingu atveju pateikia melas.</p>
    </div>
</div>';
