<?php
session_start();
// Last Edit 4-8-2023

require_once("../../info/class_page.php");
$new_page  = new page( );

$index = 2; //this index variable identifies that this is THE index page

$title  = "Trees";
$author = "Will Johnston";
$keyWords = "Trees";
$description = "Trees";
$heading = "Trees";
$showAds = 'n';

$css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
?>

<h1>Trees:</h1>

<ol>

    <li> <b>American Beech</b> - (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Fagus americana</i><br>
        could not find Fagus americana<br>
        <a href="https://en.wikipedia.org/wiki/Fagus_grandifolia">https://en.wikipedia.org/wiki/Fagus_grandifolia></a>  - <i>Fagus grandifolia</i>, the American beech or North American beech<br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=FAGR">https://plants.usda.gov/home/plantProfile?symbol=FAGR</a> - <i>Fagus grandifolia</i> - American Beech<br>
    </li>

    <li> <b>American Holley</b> - (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Ilex opaca</i><br>
         <a href="https://en.wikipedia.org/wiki/Ilex_opaca">https://en.wikipedia.org/wiki/Ilex_opaca</a><br>
         <a href="https://plants.ces.ncsu.edu/plants/ilex-opaca-clarendon-spreading/">https://plants.ces.ncsu.edu/plants/ilex-opaca-clarendon-spreading/</a><br>
    </li>

    <li> <b>American Hornbeam</b> , also ironwood, musclewood, blue beech  (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Carpinus caroliniana</i><br>
         <a href="https://en.wikipedia.org/wiki/Carpinus_caroliniana">https://en.wikipedia.org/wiki/Carpinus_caroliniana</a><br>
         <a href="https://plants.ces.ncsu.edu/plants/carpinus-caroliniana/">https://plants.ces.ncsu.edu/plants/carpinus-caroliniana/</a><br>
    </li>

    <li> <b>Bigleaf Magnolia</b> (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Magnolia macrophylla</i><br>
         <a href="https://en.wikipedia.org/wiki/Magnolia_macrophylla">https://en.wikipedia.org/wiki/Magnolia_macrophylla</a><br>
         <a href="https://plants.ces.ncsu.edu/plants/magnolia-macrophylla/">https://plants.ces.ncsu.edu/plants/magnolia-macrophylla/</a><br>
    </li>

    <li> <b>Black Cherry</b> (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Prunus serotina</i><br>
        <a href="https://en.wikipedia.org/wiki/Prunus_serotina">https://en.wikipedia.org/wiki/Prunus_serotina</a>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=PRSE2">https://plants.usda.gov/home/plantProfile?symbol=PRSE2</a><br>
also an Alabama cherry (no picture):
        <a href="https://plants.usda.gov/home/plantProfile?symbol=PRAL7">https://plants.usda.gov/home/plantProfile?symbol=PRAL7</a><br>
    </li>

    <li> <b>Black Gum</b> (or black tupelo?)  (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Nyssa sylvatica</i><br>
        <a href="https://en.wikipedia.org/wiki/Nyssa_sylvatica">https://en.wikipedia.org/wiki/Nyssa_sylvatica</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=NYSY">https://plants.usda.gov/home/plantProfile?symbol=NYSY</a><br>
    </li>

    <li> <b>Black Walnut</b> (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Juglans nigra</i><br>
        <a href="https://en.wikipedia.org/wiki/Juglans_nigra">https://en.wikipedia.org/wiki/Juglans_nigra</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=JUNI">https://plants.usda.gov/home/plantProfile?symbol=JUNI</a><br>
    </li>

    <li> <b>Bluestem Palmetto</b><br>
        <i>Sabal minor</i><br>
        <a href="https://en.wikipedia.org/wiki/Sabal_minor">https://en.wikipedia.org/wiki/Sabal_minor</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=SAMI8">https://plants.usda.gov/home/plantProfile?symbol=SAMI8</a><br>
    </li>

    <li> <b>Darlington Oak</b><br>
        <i>Quercus hemisphaerica</i><br>
        <a href="https://en.wikipedia.org/wiki/Quercus_hemisphaerica">https://en.wikipedia.org/wiki/Quercus_hemisphaerica</a><br>
        <a href="https://plants.ces.ncsu.edu/plants/quercus-hemisphaerica/">https://plants.ces.ncsu.edu/plants/quercus-hemisphaerica/</a><br>
    </li>

    <li> <b>Devil's Walking Stick</b><br>
        <i>Aralia spinosa</i><br>
        <a href="https://en.wikipedia.org/wiki/Aralia_spinosa">https://en.wikipedia.org/wiki/Aralia_spinosa</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=ARSP2">https://plants.usda.gov/home/plantProfile?symbol=ARSP2</a><br>
    </li>

    <li> <b>Florida Anise</b><br>
        <i>Illicium floridanum</i><br>
        <a href="https://en.wikipedia.org/wiki/Illicium_floridanum">https://en.wikipedia.org/wiki/Illicium_floridanum</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=ILFL">https://plants.usda.gov/home/plantProfile?symbol=ILFL</a><br>
    </li>

    <li> <b>Green Ash</b> (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Fraxinus pennsylvanica</i><br>
        <a href="https://en.wikipedia.org/wiki/Fraxinus_pennsylvanica">https://en.wikipedia.org/wiki/Fraxinus_pennsylvanica</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=FRPE">https://plants.usda.gov/home/plantProfile?symbol=FRPE</a><br>
    </li>


    <li> <b>Hop Hornbeam</b> (Eastern Hophornbeam?) also ironwood  (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Ostrya virginica</i><br>
        <a href="https://en.wikipedia.org/wiki/Ostrya_virginiana">https://en.wikipedia.org/wiki/Ostrya_virginiana</a> (note the virginiANA - Blakeley sign has ICA??)<br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=OSVI">https://plants.usda.gov/home/plantProfile?symbol=OSVI</a><br>
    </li>

    <li> <b>Loblolly Pine</b> (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Pinus taeda</i><br>
        <a href="https://en.wikipedia.org/wiki/Pinus_taeda">https://en.wikipedia.org/wiki/Pinus_taeda</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=PITA">https://plants.usda.gov/home/plantProfile?symbol=PITA</a><br>
    </li>

    <li> <b>Longleaf Pine</b> (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Pinus palustris</i><br>
        <a href="https://en.wikipedia.org/wiki/Longleaf_pine">https://en.wikipedia.org/wiki/Longleaf_pine</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=PIPA2">https://plants.usda.gov/home/plantProfile?symbol=PIPA2</a><br>
    </li>

    <li> <b>Mockernut Hickory</b> (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Carya tomentosa</i><br>
        <a href="https://en.wikipedia.org/wiki/Carya_tomentosa">https://en.wikipedia.org/wiki/Carya_tomentos</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=CATO6">https://plants.usda.gov/home/plantProfile?symbol=CATO6</a><br>
    </li>

    <li> <b>Pignut Hickory</b> (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Carya glabra</i><br>
        <a href="https://en.wikipedia.org/wiki/Carya_glabra">https://en.wikipedia.org/wiki/Carya_glabra</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=CAGL8">https://plants.usda.gov/home/plantProfile?symbol=CAGL8</a><br>
    </li>

    <li> <b>Red Cedar</b>  also Eastern Redcedar  (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Juniperus virginiana</i><br>
        <a href="https://en.wikipedia.org/wiki/Juniperus_virginiana">https://en.wikipedia.org/wiki/Juniperus_virginiana</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=JUVI">https://plants.usda.gov/home/plantProfile?symbol=JUVI</a><br>
    </li>

    <li> <b>Red Maple</b> (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Acer rubrum</i><br>
        <a href="https://en.wikipedia.org/wiki/Acer_rubrum">https://en.wikipedia.org/wiki/Acer_rubrum</a><br>
         <a href="https://plants.usda.gov/home/plantProfile?symbol=ACRU">https://plants.usda.gov/home/plantProfile?symbol=ACRU</a><br>
    </li>

    <li> <b>Sourwood</b>  (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Oxydendrum arboreum</i><br>
        <a href="https://en.wikipedia.org/wiki/Oxydendrum">https://en.wikipedia.org/wiki/Oxydendrum</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=OXAR">https://plants.usda.gov/home/plantProfile?symbol=OXAR</a><br>
    </li>


    <li> <b>Sparkleberry</b><br>
        <i>Vaccinium arboreum</i><br>
        <a href="https://en.wikipedia.org/wiki/Vaccinium_arboreum">https://en.wikipedia.org/wiki/Vaccinium_arboreum</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=VAAR">https://plants.usda.gov/home/plantProfile?symbol=VAAR</a><br>
    </li>


    <li> <b>Swamp Chestnut Oak</b><br>
        <i>Quercus michauxii</i><br>
        <a href="https://en.wikipedia.org/wiki/Quercus_michauxii">https://en.wikipedia.org/wiki/Quercus_michauxii</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=QUMI">https://plants.usda.gov/home/plantProfile?symbol=QUMI</a><br>
    </li>

    <li> <b>Swamp Tupelo</b><br>
        <i>Nyssa biflora</i><br>
        <a href="https://en.wikipedia.org/wiki/Nyssa_biflora">https://en.wikipedia.org/wiki/Nyssa_biflora</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=NYBI">https://plants.usda.gov/home/plantProfile?symbol=NYBI</a><br>
    </li>

    <li> <b>Sweetbay Magnolia</b>   (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Magnolia Virginiana</i><br>
        <a href="https://en.wikipedia.org/wiki/Magnolia_virginiana">https://en.wikipedia.org/wiki/Magnolia_virginiana</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=MAVI2">https://plants.usda.gov/home/plantProfile?symbol=MAVI2</a><br>
    </li>

    <li> <b>Sweetgum</b>   (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Liquicambar styraciflua</i><br>
        <a href="https://en.wikipedia.org/wiki/Liquidambar_styraciflua">https://en.wikipedia.org/wiki/Liquidambar_styraciflua</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=LIST2">https://plants.usda.gov/home/plantProfile?symbol=LIST2</a><br>
    </li>

    <li> <b>Tulip Poplar</b>  also tulip-poplar, tuliptree, yellow-poplar  (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Liriodendron tulipifera</i><br>
        <a href="https://en.wikipedia.org/wiki/Liriodendron_tulipifera">https://en.wikipedia.org/wiki/Liriodendron_tulipifera"</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=LITU">https://plants.usda.gov/home/plantProfile?symbol=LITU</a><br>
    </li>

    <li> <b>White Oak</b> (www.aces.edu ANR-0509 Alabama Native Tree)<br>
        <i>Quercus alba</i><br>
        <a href="https://en.wikipedia.org/wiki/Quercus_alba">https://en.wikipedia.org/wiki/Quercus_alba</a><br>
        <a href="https://plants.usda.gov/home/plantProfile?symbol=QUAL">https://plants.usda.gov/home/plantProfile?symbol=QUAL</a><br>
    </li>

    <li> <b>Witch Hazel</b><br>
         <i>Hamamelis virginiana</i><br>
        <a href="https://en.wikipedia.org/wiki/Hamamelis_virginiana">https://en.wikipedia.org/wiki/Hamamelis_virginiana</a><br>
        <a href="https://en.wikipedia.org/wiki/Hamamelis_virginiana"></a><br>
    </li>

</ol>

<?php
$new_page->close_page($index);















