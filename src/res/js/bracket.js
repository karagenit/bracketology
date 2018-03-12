// ID Structure: REGION ROUND INDEX e.g. S 0 0

function bracketClick(team) {
    var name = $(team).text();
    var args = $(team).attr('id').split(' ');
    var region = args[0];
    var round = parseInt(args[1]);
    var index = parseInt(args[2]);

    var nextRound = round + 1;
    var nextIndex = Math.floor(index/2);

    // we've just picked someone to move on to Final Four round
    if (nextRound === 4) {
        region = 'F';
    }

    var targetID = region + ' ' + nextRound + ' ' + nextIndex;

    // for whatever reason, $(#...) isn't working here...
    $(document.getElementById(targetID)).text(name);
}
