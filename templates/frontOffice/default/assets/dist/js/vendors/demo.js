(function($) {

    "use strict";

    function buildRuleset() {

        // Start creating a new ruleset
        var ruleset = $.deps.createRuleset();
        
        /* Badezimmer */
        
        var masterSwitchBad = ruleset.createRule("#projekt-art"); 
        // Fragen
        var projektArtBad = masterSwitchBad.createRule("#projekt-art", "==", 2);
        projektArtBad.include(".bad-projekt-geraet");
        

        var projektArtBadToilette = projektArtBad.createRule("#bad-projekt-geraet", "==",2);
        var projektArtBadToiletteSink = projektArtBad.createRule("#bad-projekt-geraet", "any",new Array("2","4"));
        projektArtBadToiletteSink.include(".anzahl");
        
        
        var projektArtBadToiletteErsatz = projektArtBadToilette.createRule("#bad-arbeit-typ", "==",3);
        projektArtBadToiletteErsatz.include(".bad-ersatz-unit");
        projektArtBadToiletteErsatz.include(".marke");
        
        var projektArtBadToiletteReparatur = projektArtBadToilette.createRule("#bad-arbeit-typ", "==",2);
        projektArtBadToiletteReparatur.include(".toilet-repair");
        
      
        var projektArtBadShower = projektArtBad.createRule("#bad-projekt-geraet", "==",3);
        
       
        
        var projektArtBadToiletShowerSinkPlumbing = projektArtBad.createRule("#bad-projekt-geraet", "any",new Array("2","3","4","5"));
        projektArtBadToiletShowerSinkPlumbing.include(".bad-arbeit-typ");
        
        var projektArtBadShowerReparatur = projektArtBadShower.createRule("#bad-arbeit-typ", "==",2);
        projektArtBadShowerReparatur.include(".shower-repair");
        
        var projektArtBadShowerErsatz = projektArtBadShower.createRule("#bad-arbeit-typ", "==",3);
        projektArtBadShowerErsatz.include(".bad-ersatz-unit");
        
        var projektArtBadSink = projektArtBad.createRule("#bad-projekt-geraet", "==",4);
        var projektArtBadSinkReparatur = projektArtBadSink.createRule("#bad-arbeit-typ", "==",2);
        projektArtBadSinkReparatur.include(".sink-repair");
        
        var projektArtBadPlumbing = projektArtBad.createRule("#bad-projekt-geraet", "==",5);
        var projektArtBadPlumbingOther = projektArtBad.createRule("#bad-projekt-geraet", "any",new Array("5","6"));
        projektArtBadPlumbingOther.include(".plumbing-appliance-type");
        
        
        
        var projektArtPipe = masterSwitchBad.createRule("#projekt-art", "==", 3);
        projektArtPipe.include(".pipe-projekt-geraet");
        
        var projektArtWaterHeater = masterSwitchBad.createRule("#projekt-art", "==", 4);
        
        
        projektArtWaterHeater.include(".water-heater-arbeit-typ");
        var projektArtWaterHeaterErsatz = projektArtWaterHeater.createRule("#water-heater-arbeit-typ", "==", 3);
        projektArtWaterHeaterErsatz.include(".baujahr");
        projektArtWaterHeaterErsatz.include(".hausgroesse");
        projektArtWaterHeaterErsatz.include(".badezimmer-anzahl");
        projektArtWaterHeaterErsatz.include(".pipe-material");
        projektArtWaterHeaterErsatz.include(".water-heater-location");
        projektArtWaterHeaterErsatz.include(".water-heater-age");
        projektArtWaterHeaterErsatz.include(".supply-water-heater");
        
        var projektArtWaterHeaterReparatur = projektArtWaterHeater.createRule("#water-heater-arbeit-typ", "==", 2);
        projektArtWaterHeaterReparatur.include(".water-heater-marke");
        
        var supplyWaterHeater = projektArtWaterHeater.createRule("#supply-water-heater", "==", 2);
        supplyWaterHeater.include(".water-heater-type");
        supplyWaterHeater.include(".water-heater-capacity");

        
        
        
        
        
        
        
        
        

        // Some sample pop-ups based on number input value

        var twoAttempts = masterSwitchBad.createRule("#numberOfAttempts", "==", 2);
        twoAttempts.include("#two-attempts-test");

        var threeAttempts = masterSwitchBad.createRule("#numberOfAttempts", "==", 3);
        threeAttempts.include("#three-attempts-test");

      



        // Check that <select> value equals our choice "yes"
        var angioplasty = masterSwitchBad.createRule("#angioplasty", "==", "yes");
        angioplasty.include(".datagridwidget-block-angioplastyExtraCranial");
        angioplasty.include(".datagridwidget-block-angioplastyIntraCranial");

        // Another <select> with nested options
        masterSwitchBad.include(".datagridwidget-block-adjunctiveStenting");
        var adjunctiveStenting = masterSwitchBad.createRule("#adjunctiveStenting", "==", "yes");
        adjunctiveStenting.include(".datagridwidget-block-adjunctiveStentingExtraCranial");
        adjunctiveStenting.include(".datagridwidget-block-adjunctiveStentingIntraCranial");

        // Then add some third level options which check against checboxes
        var adjunctiveStentingExtraCranial = adjunctiveStenting.createRule("#adjunctiveStentingExtraCranial", "==", true);
        adjunctiveStentingExtraCranial.include(".datagridwidget-block-adjunctiveStentingExtraCranialType");

        var adjunctiveStentingIntraCranial = adjunctiveStenting.createRule("#adjunctiveStentingIntraCranial", "==", true);
        adjunctiveStentingIntraCranial.include(".datagridwidget-block-adjunctiveStentingIntraCranialType");


        return ruleset;
    }

    $(document).ready(function() {

        var ruleset = buildRuleset();

        var cfg = {
            log : true
        };

        // Make ruleset effective on a selection
        // and start following changes in its inputs
        $.deps.enable($("#demo-content"), ruleset, cfg);

    });

})(jQuery);