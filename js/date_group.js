function dateGroup(_dateArray) {

    if (!Array.isArray(_dateArray) || _dateArray.length < 2) {
        return false
    }

    _dateArray = _dateArray.map(function(e) {
        return new Date(e).getTime();
    })

    _dateArray.sort();

    var re = [
        [_dateArray[0]]
    ];

    _dateArray.splice(0, 1);

    while (_dateArray) {

        var lastDate = re[re.length - 1][re[re.length - 1].length - 1]; //last array  last element

        //is duplicate

        if (lastDate != _dateArray[0]) {
            if (Math.abs(lastDate - _dateArray[0]) != 86400000) {
                re.push([]);
            }

            re[re.length - 1].push(_dateArray[0]);
        }

        _dateArray.splice(0, 1);

        if (_dateArray.length == 0) {
            _dateArray = null;
        }

    }

    for (var i = 0; i < re.length; i++) {
        for (var j = 0; j < re[i].length; j++) {
            var _dateFormat = new Date(re[i][j]);
            re[i][j] = _dateFormat.getFullYear() + "/" + (_dateFormat.getMonth() + 1) + "/" + _dateFormat.getDate();
        }

    }

    return re

}
