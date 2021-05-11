 <?php



 switch ($ave_mid) {
                  case ($ave_mid >= 85):
                  $grade = "A1";
                  $remark = "EXCELLENT";
                  break;

                  case ($ave_mid >= 75):
                  $grade = "B2";
                  $remark = "VERY GOOD";
                  break;

                  case ($ave_mid >= 70):
                  $grade = "B3";
                  $remark = "GOOD";
                  break;

                  case ($ave_mid >= 65):
                  $grade = "C4";
                  $remark = "CREDIT";
                  break;

                  case ($ave_mid >= 60):
                  $grade = "C5";
                  $remark = "CREDIT";
                  break;

                  case ($ave_mid >= 55):
                  $grade = "C6";
                  $remark = "CREDIT";
                  break;

                   case ($ave_mid >= 50):
                  $grade = "D7";
                  $remark = "PASS";
                  break;

                 case ($ave_mid >= 40):
                  $grade = "E8";
                  $remark = "PASS";
                  break;

                   case ($ave_mid < 40):
                  $grade = "F9";
                  $remark = "FAIL";
                  break;

                  default:
                  $grade = "";
                  $remark = "";
                  break;
        } 
                      ?>