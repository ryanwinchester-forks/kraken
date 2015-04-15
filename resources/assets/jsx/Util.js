
var Util = {

    merge: function (a, b) {
        var k
        var r = {}
        for (k in a) {
            r[k] = a[k]
        }
        for (k in b) {
            r[k] = b[k]
        }
        return r
    },

    setImagePositionFromEvent: function (node, e) {
        node.style.left = '' + (e.pageX + 10) + 'px'
        node.style.top = '' + (e.pageY + 10) + 'px'
    },

    /**
     * Swap values in an array
     */
    swap: function (array, a, b) {
        array = array.slice(0)
        var aVal = array[a]
        var bVal = array[b]
        array[a] = bVal
        array[b] = aVal
        return array
    }
}

export default Util;