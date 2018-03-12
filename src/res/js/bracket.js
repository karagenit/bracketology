// ID Structure: REGION ROUND INDEX e.g. S 0 0
// Hidden Input Structure is the same but with a preceeding I

function bracketClick(team) {
    var name = $(team).text();
    var args = $(team).attr('id').split(' ');
    var region = args[0];
    var round = parseInt(args[1]);
    var index = parseInt(args[2]);

    var nextRound = round + 1;
    var nextIndex = Math.floor(index/2);

    var targetID = region + ' ' + nextRound + ' ' + nextIndex;

    // for whatever reason, $(#...) isn't working here...
    $(document.getElementById(targetID)).text(name);
    $(document.getElementById('I' + targetID)).val(name);

    // if we've just picked a Final Four guy, also set him in the FF bracket
    if (nextRound === 4) {
        region = 'F';
        var targetID = region + ' ' + nextRound + ' ' + nextIndex;

        // for whatever reason, $(#...) isn't working here...
        $(document.getElementById(targetID)).text(name);
        $(document.getElementById('I' + targetID)).val(name);
    }
}
