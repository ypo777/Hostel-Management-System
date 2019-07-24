<?php
session_start();
include_once 'LayoutHeader.php';
include_once '../../Controller/Register_Controller.php';
?>
<div class="ui grid">
    <div class="seven wide column">
        <h1 class="header">
            Rules For Hostel
        </h1>
    </div>
    <div class="ten wide" style="margin-top: 20px">
        <form class="ui form" action="../../Controller/Register_Controller.php" method="get">
            <h1 class="ui dividing header">Registration Form</h1>
            <div class="field">
                <label>Name</label>
                <div class="two fields">
                    <div class="field">
                        <input type="text" name="request[firstname]" placeholder="First Name">
                    </div>
                    <div class="field">
                        <input type="text" name="request[lastname]" placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Email</label>
                <div class="field">
                    <input type="text" name="request[email]" placeholder="example@gmail.com">
                </div>
            </div>

            <div class="field">
                <label>Roll No</label>
                <div class="field">
                    <input type="text" name="request[rollno]" placeholder="1CST - 1">
                </div>
            </div>
            <div class="field">
                <label>Major</label>
                <select class="ui fluid dropdown" name="request[major]">
                    <option value="">Major</option>
                    <option value="CST">CST</option>
                    <option value="CS">CS</option>
                    <option value="CT">CT</option>
                    <option value="SE">SE</option>
                    <option value="KE">KE</option>
                    <option value="HPC">HPC</option>
                    <option value="CN">CN</option>
                    <option value="BIS">BIS</option>
                    <option value="ES">ES</option>
                </select>
            </div>
            <div class="field">
                <label>Year</label>
                <select class="ui fluid dropdown" name="request[year]">
                    <option value="">Year</option>
                    <option value="First Year">First Year</option>
                    <option value="Second Year">Second Year</option>
                    <option value="Third Year">Third Year</option>
                    <option value="Fourth Year">Fourth Year</option>
                    <option value="Fifth Year">Fifth Year</option>
                    <option value="Master">Master</option>
                </select>
            </div>

            <div class="field">
                <label>Home Address</label>
                <div class="fields">
                    <div class="twelve wide field">
                        <input type="text" name="request[address-1]" placeholder="Street Address">
                    </div>
                    <div class="four wide field">
                        <input type="text" name="request[address-2]" placeholder="Town">
                    </div>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>State</label>
                    <select class="ui fluid dropdown" name="request[address-3]">
                        <option value="">State</option>
                        <option value="Ayeyarwady Region">Ayeyarwady Region</option>
                        <option value="Bago Region">Bago Region</option>
                        <option value="Chin State">Chin State</option>
                        <option value="Kachin State">Kachin State</option>
                        <option value="Kayah State">Kayah State</option>
                        <option value="Kayin State">Kayin State</option>
                        <option value="Magway Region">Magway Region</option>
                        <option value="Mandalay Region">Mandalay Region</option>
                        <option value="Mon State">Mon State</option>
                        <option value="Rakhine State">Rakhine State</option>
                        <option value="Shan State">Shan State</option>
                        <option value="Sagaing Region">Sagaing Region</option>
                        <option value="Tanintharyi Region">Tanintharyi Region</option>
                        <option value="Flag of Yangon Division.svg	Yangon Region">Yangon Region</option>
                        <option value="Naypyidaw Union Territory">Naypyidaw  Territory</option>
                    </select>
                </div>

            </div>

            <input class="ui green button" type="submit" tabindex="0" name="register" value="Register">
        </form>
    </div>
</div>


<?php
include_once 'Layout_Footer.php';
?>
