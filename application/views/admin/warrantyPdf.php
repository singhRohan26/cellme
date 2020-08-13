    <html>
<head>
   <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style> 
</head>    

    <body>
    
        <center><img src="<?php echo base_url('uploads/logo.png') ?>" height="100" width="auto"></center><br>
        <table>
  <tr>
    <th colspan="3" style="text-align:center">Phone Info</th>
    
  </tr>
  <tr>
    <td colspan="3" ><span>Device Name : <?php echo $device['device_name'].' '. $device['model_no'] ?></span></td>
  </tr> 
  <tr>
    <td colspan="3" style="font-size: 10px;"><span>IMEI : <?php echo $device['imei'] ?></span></td>
  </tr> 
  <tr>
    <td  style="font-size: 10px;"><span>Processor : <?php echo $device['processor'] ?></span></td>
    <td  style="font-size: 10px;"><span>Front Camera : <?php echo $device['front_camera'] ?> MP</span></td>
    <td  style="font-size: 10px;"><span>Back Camera : <?php echo $device['main_camera'] ?> MP</span></td>
  </tr>
<tr>
    <td  style="font-size: 10px;"><span>Os : <?php echo $device['os'] ?></span></td>
    <td  style="font-size: 10px;"><span>RAM : <?php echo $device['device_ram'] ?></span></td>
    <td  style="font-size: 10px;"><span>Resolution : <?php echo $device['resolution'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Storage : <?php echo $device['storage'] ?></span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span>Model No. : <?php echo $device['model_no'] ?></span></td>
  </tr> 
<tr>
    <th colspan="3" style="text-align:center">Test Result</th>
    
  </tr>
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Test Complete</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $overall; ?>%</span></td>
  </tr> 
            <tr>
    <td colspan="3" ><br></td>
  </tr> 
<tr>
    <th  style="font-size: 10px;text-align: left"><span>Automatic Function</span></th>
    <th colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automatic_attempt ?></span></th>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Battery</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['battery'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Cellular</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['cellular_network'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Cpu</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['cpu'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Gps</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['gps'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Vibration</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['vibration'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Call Function</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['call_function'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Memory</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['memory'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Speed</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['speed'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Storage</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['storage'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Specification</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['specification'] ?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Flash</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['flash'] ?></span></td>
  </tr>
            <tr>
    <td  style="font-size: 10px;text-align: left"><span>Bluetooth</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['bluetooth'] ?></span></td>
  </tr><tr>
    <td  style="font-size: 10px;text-align: left"><span>Speaker</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['speaker'] ?></span></td>
  </tr><tr>
    <td  style="font-size: 10px;text-align: left"><span>Wifi</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['wifi'] ?></span></td>
  </tr>
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Bottom Microphone</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $automaticTesting['bottom_microphone']?></span></td>
  </tr>
    <br>

    
    <?php if(!empty($quickManualTesting)){     ?>
            <tr>
    <th  style="font-size: 10px;text-align: left"><span>Manual Function</span></th>
    <th colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manual_attempt; ?></span></th>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>front Camera</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $quickManualTesting['front_camera']?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Back Camera</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $quickManualTesting['back_camera']?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Hardware Buttons</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $quickManualTesting['hardware_btn']?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Touch screen</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $quickManualTesting['touch_Screen']?></span></td>
  </tr> 

    <tr>
    <td  style="font-size: 10px;text-align: left"><span>Proximity Sensor</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $quickManualTesting['proxmity_sensor']?></span></td>
  </tr>
            <?php }else{   ?>
        <tr><th  style="font-size: 10px;text-align: left"><span>Manual Function</span></th>
    <th colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manual_attempt; ?></span></th>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>front Camera</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['front_camera']?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Back Camera</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['back_camera']?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Hardware Buttons</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['hardware_btn']?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Touch screen</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['touch_Screen']?></span></td>
  </tr>        

<tr>
    <td  style="font-size: 10px;text-align: left"><span>Headphone</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['headphone']?></span></td>
  </tr> 
 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Earpiece</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['earpiece']?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Accelerometer</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['accelerometer']?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Charger</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['charger']?></span></td>
  </tr> 
<tr>
    <td  style="font-size: 10px;text-align: left"><span>Compass</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['compass']?></span></td>
  </tr>
            <tr>
    <td  style="font-size: 10px;text-align: left"><span>Finger Print</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['fingerprint']?></span></td>
  </tr>
            <tr>
    <td  style="font-size: 10px;text-align: left"><span>Light Sensor</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['light_sensor']?></span></td>
  </tr>
            <tr>
    <td  style="font-size: 10px;text-align: left"><span>Gyroscope</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['gyroscope']?></span></td>
  </tr>
            
              <tr>
    <td  style="font-size: 10px;text-align: left"><span>Face Id</span></td>
    <td colspan="2"  style="font-size: 10px;text-align: right"><span><?php echo $manualTesting['face_id']?></span></td>
  </tr>
   <br>
        <?php } ?>
        
</table>
        
    </body>

</html>