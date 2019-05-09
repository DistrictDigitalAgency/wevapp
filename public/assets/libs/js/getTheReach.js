function getTheReachNumber(questionPrice, questionID) {
    //var questionPrice = document.getElementsByName("questionPrice0");
    var nbQuestion=document.getElementById("nbQuestion").value;
    var questionTotalPrice=0;
    var questionTotalReach=0;
    if (questionID=="questionPrice0")
    {
        if (parseInt("0"+questionPrice, 10) > 0)
            {
                document.getElementById("questionReach0").innerHTML ="The maximum possible reach is "+questionPrice*10+" person.";
            }
        else
            {
                document.getElementById("questionReach0").innerHTML ="You must put a number in TND.";

            }
    }
    else if (questionID=="questionPrice1")
    {
        if (parseInt("0"+questionPrice, 10) > 0)
        {
            document.getElementById("questionReach1").innerHTML ="The maximum possible reach is "+questionPrice*10+" person.";
        }
        else
        {
            document.getElementById("questionReach1").innerHTML ="You must put a number in TND.";

        }
    }
    else if (questionID=="questionPrice2")
    {
        if (parseInt("0"+questionPrice, 10) > 0)
        {
            document.getElementById("questionReach2").innerHTML ="The maximum possible reach is "+questionPrice*10+" person.";
        }
        else
        {
            document.getElementById("questionReach2").innerHTML ="You must put a number in TND.";

        }
    }
    else if (questionID=="questionPrice3")
    {
        if (parseInt("0"+questionPrice, 10) > 0)
        {
            document.getElementById("questionReach3").innerHTML ="The maximum possible reach is "+questionPrice*10+" person.";
        }
        else
        {
            document.getElementById("questionReach3").innerHTML ="You must put a number in TND.";

        }
    }
    else if (questionID=="questionPrice4")
    {
        if (parseInt("0"+questionPrice, 10) > 0)
        {
            document.getElementById("questionReach4").innerHTML ="The maximum possible reach is "+questionPrice*10+" person.";
        }
        else
        {
            document.getElementById("questionReach4").innerHTML ="You must put a number in TND.";

        }
    }


    //document.getElementById("campaignTotalReach").innerHTML ="Campaign total price: "+questionTotalPrice+"| Campaign total reach:  "+questionTotalReach+".";




    //document.getElementById("campaignName").innerHTML =document.getElementById('inputCampaignName').value;
    //document.getElementById("nbQuestions").innerHTML =document.getElementById("nbQuestion").value;;

}

