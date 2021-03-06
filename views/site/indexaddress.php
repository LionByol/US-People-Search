<?php
use yii\helpers\Url;

$this->title = 'Address Search - Hero Searches';
?>
<div class="banner video-background pv-40 dark-translucent-bg hovered">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-center col-md-offset-2 pv-20">
                <h1 class="title">The Internet's Most Trusted Hero Searches</h1>
                <div class="separator mt-10"></div>
                <p class="text-center">Backround Reports, Criminal Records, Contact Details, and More!</p>
            </div>
        </div>
    </div>
    <div class="dark-translucent-bg section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                <center>
                    <form class="form-inline">
                        <div class="form-group width-45 response-width-search">
                            <input type="text" class="form-control search-field" placeholder="e.g. 1600 Pennsylvnia Ave NW" id="search-street" onkeyup="onStreetChange()">
                        </div>
                        <div class="form-group has-feedback width-45 response-width-search">
                            <input type="text" class="form-control search-field" id="search-zip" placeholder="City, State or ZIP" >
                            <span class="fa fa-search form-control-feedback font-26" style="width:50px;height:50px;line-height:50px !important;z-index: 10;pointer-events: auto;cursor: pointer;" onclick="onSearch()"></span>
                        </div>
                    </form>
                    <p id="error" style="color:red;"></p>
                </center>
                </div>
            </div>
        </div>
    </div>
        
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(Yii::$app->user->isGuest)
                {
                ?>
                <form class="text-center" action="<?= Url::to(['site/signup']) ?>">
                    <button type="submit" class="btn btn-lg btn-gray-transparent btn-animated margin-clear">Get Started<i class="fa fa-check"></i></button>
                </form>
                <?php
                }else{
                    ?>
                    <div style="height: 100px;"></div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<section class="section clearfix">
    <div class="container">
        <h2 class="logo-font text-center text-muted">Features - Hero Searches</h2>
        <div class="separator"></div>
        <p class="lead text-center">Access full contact details including mobile numbers, bankruptcy records, criminal records, and more.</p>
        <div class="tab-content clear-style">
            <div class="tab-pane active" id="pill-1">
                <div class="row">
                    <div class="col-md-3">
                        <div class="image-box text-center style-2 mb-20">
                            <img src="/images/contact.jpg" alt="hero searches" class="img-circle img-thumbnail">
                            <div class="body padding-horizontal-clear">
                                <h4 class="title">Contact Data</h4>
                                <p class="small mb-10">
                                    Current Address
                                    Address History
                                    Aliases
                                    Age & Birth Info
                                    Family Members & Associates
                                    Phone Numbers
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="image-box text-center style-2 mb-20">
                            <img src="/images/mobile.jpg" alt="hero searches" class="img-circle img-thumbnail">
                            <div class="body padding-horizontal-clear">
                                <h4 class="title">Mobile Numbers</h4>
                                <p class="small mb-10">
                                    Owner Name
                                    Associated People
                                    Carrier or Provider
                                    Previous Owners
                                    Location
                                    Line type
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="image-box text-center style-2 mb-20">
                            <img src="/images/court.jpg" alt="hero searches" class="img-circle img-thumbnail">
                            <div class="body padding-horizontal-clear">
                                <h4 class="title">Court Records</h4>
                                <p class="small mb-10">
                                    Criminal Offense Data
                                    Traffic Violations
                                    Mug-shots
                                    Crime Details
                                    Result Accuracies
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="image-box text-center style-2 mb-20">
                            <img src="/images/properties.jpg" alt="hero searches" class="img-circle img-thumbnail">
                            <div class="body padding-horizontal-clear">
                                <h4 class="title">Properties & Licenses</h4>
                                <p class="small mb-10">
                                    Properties Owned
                                    Previous Properties
                                    Professional Licenses
                                    Hunting Licenses
                                    Concealed Weapon Permits
                                    Drivers Licenses
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- pills end -->
    </div>              
</section>

<script>
function onSearch ()              //people name search
{
    var streetname = document.getElementById("search-street");
    var address = document.getElementById("search-zip");
    if(streetname.value == '')
    {
        var err = document.getElementById("error");
        err.style.display = "block";
        err.innerHTML = "Please input street information.";
        return;
    }
    var fd = new FormData();
    fd.append('street', streetname.value);
    fd.append('address', address.value);
    $.ajax({
        url: '<?=\yii\helpers\BaseUrl::home()?>/search/streetaddress',
        cache: false,
        type: 'POST',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data)
        {
            alert(data);
        },
        error: function () {
            alert("ERROR in Internet.");
        }
    });
}

function onStreetChange()       //street box change monitor
{
    var street = document.getElementById("search-street");
    if(street.value != '')
    {
        var err = document.getElementById("error");
        err.style.display = "none";
        err.innerHTML = "";
    }
}
</script>