<?php
/*
 */
?>
<div id="communities"></div>
<div id="numberfunctioning"></div>
<div id="numberWaterPointsPerCommnunity"></div>
<script src="jquery-1.11.3.js"></script>
<script type="text/javascript">
//get Json data
    $.getJSON('water-points.json', function (jsondata) {
        numberFunctoional(jsondata);
        numberWaterPointsPerCommnunity(jsondata);
        percentageBroken(jsondata);
    });

//The number of water points that are functional,
    function numberFunctoional(jsondata)
    {
        var communities = [], numberfunctioning = 0;
        //get the lenght of the array
        for (i = 0; i < jsondata.length; i++)
        {
            //check if community village is already in the array if doesnt exist add in the communities array.
            if ($.inArray(jsondata[i], communities == -1))
            {
                communities.push(jsondata[i]);
                if (jsondata[i]['water_functioning'] == 'yes')
                {

                    numberfunctioning++;
                    JSON.stringify(numberfunctioning);
                    document.getElementById("numberfunctioning").innerHTML = 'Number Total Functioning : ' + numberfunctioning;

                }

            }

        }

    }
    //The number of water points per community,
    function numberWaterPointsPerCommnunity(jsondata)
    {
        var communities = [], waterpoints = 0;
        //get the lenght of the array
        for (i = 0; i < jsondata.length; i++)
        {
            //check if community village is already in the array if doesnt exist add in the communities array.

            if (jsondata[i]['water_point_condition'] == 'functioning')
            {
                if ($.inArray(jsondata[i], communities == -1))
                {
                    communities.push(jsondata[i]);

                    console.log(jsondata[i]['communities_villages']);

                }
            }
        }

    }

//The rank for each community by the percentage of broken water points.
    function percentageBroken(jsondata)
    {
        var communities = [], waterpoints = 0, totalfunctioning = 0,
                totalBroken = 0;
        //get the lenght of the array
        for (i = 0; i < jsondata.length; i++)
        {
            if (jsondata[i]['water_point_condition'] == 'broken')
            {
                if ($.inArray(jsondata[i], communities == -1))
                {
                    communities.push(jsondata[i]);
                    totalBroken++;

                }
            }

            if (jsondata[i]['water_point_condition'] == 'functioning')
            {
                totalfunctioning++;

            }

            double ranking = (totalfunctioning * 100) / totalBroken;
            console.log(ranking);
        }

    }




</script>

