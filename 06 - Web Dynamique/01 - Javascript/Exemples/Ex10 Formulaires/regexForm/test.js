(function () {
    var t = function Pt() {
        var t = {
            _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
            _f: String.fromCharCode,
            compressToBase64: function (e) {
                if (null == e) return "";
                var i, n, r, o, s, a, c, u = "",
                    p = 0;
                for (e = t.compress(e); p < 2 * e.length;) p % 2 == 0 ? (i = e.charCodeAt(p / 2) >> 8, n = 255 & e.charCodeAt(p / 2), r = p / 2 + 1 < e.length ? e.charCodeAt(p / 2 + 1) >> 8 : NaN) : (i = 255 & e.charCodeAt((p - 1) / 2), (p + 1) / 2 < e.length ? (n = e.charCodeAt((p + 1) / 2) >> 8, r = 255 & e.charCodeAt((p + 1) / 2)) : n = r = NaN), p += 3, o = i >> 2, s = (3 & i) << 4 | n >> 4, a = (15 & n) << 2 | r >> 6, c = 63 & r, isNaN(n) ? a = c = 64 : isNaN(r) && (c = 64), u = u + t._keyStr.charAt(o) + t._keyStr.charAt(s) + t._keyStr.charAt(a) + t._keyStr.charAt(c);
                return u
            },
            decompressFromBase64: function (e) {
                if (null == e) return "";
                var i, n, r, o, s, a, c, u = "",
                    p = 0,
                    h = 0,
                    l = t._f;
                for (e = e.replace(/[^A-Za-z0-9\+\/\=]/g, ""); h < e.length;) n = t._keyStr.indexOf(e.charAt(h++)) << 2 | (s = t._keyStr.indexOf(e.charAt(h++))) >> 4, r = (15 & s) << 4 | (a = t._keyStr.indexOf(e.charAt(h++))) >> 2, o = (3 & a) << 6 | (c = t._keyStr.indexOf(e.charAt(h++))), p % 2 == 0 ? (i = n << 8, 64 != a && (u += l(i | r)), 64 != c && (i = o << 8)) : (u += l(i | n), 64 != a && (i = r << 8), 64 != c && (u += l(i | o))), p += 3;
                return t.decompress(u)
            },
            compressToUTF16: function (e) {
                if (null == e) return "";
                var i, n, r, o = "",
                    s = 0,
                    a = t._f;
                for (e = t.compress(e), i = 0; i < e.length; i++) switch (n = e.charCodeAt(i), s++) {
                    case 0:
                        o += a(32 + (n >> 1)), r = (1 & n) << 14;
                        break;
                    case 1:
                        o += a(r + (n >> 2) + 32), r = (3 & n) << 13;
                        break;
                    case 2:
                        o += a(r + (n >> 3) + 32), r = (7 & n) << 12;
                        break;
                    case 3:
                        o += a(r + (n >> 4) + 32), r = (15 & n) << 11;
                        break;
                    case 4:
                        o += a(r + (n >> 5) + 32), r = (31 & n) << 10;
                        break;
                    case 5:
                        o += a(r + (n >> 6) + 32), r = (63 & n) << 9;
                        break;
                    case 6:
                        o += a(r + (n >> 7) + 32), r = (127 & n) << 8;
                        break;
                    case 7:
                        o += a(r + (n >> 8) + 32), r = (255 & n) << 7;
                        break;
                    case 8:
                        o += a(r + (n >> 9) + 32), r = (511 & n) << 6;
                        break;
                    case 9:
                        o += a(r + (n >> 10) + 32), r = (1023 & n) << 5;
                        break;
                    case 10:
                        o += a(r + (n >> 11) + 32), r = (2047 & n) << 4;
                        break;
                    case 11:
                        o += a(r + (n >> 12) + 32), r = (4095 & n) << 3;
                        break;
                    case 12:
                        o += a(r + (n >> 13) + 32), r = (8191 & n) << 2;
                        break;
                    case 13:
                        o += a(r + (n >> 14) + 32), r = (16383 & n) << 1;
                        break;
                    case 14:
                        o += a(r + (n >> 15) + 32, 32 + (32767 & n)), s = 0
                }
                return o + a(r + 32)
            },
            decompressFromUTF16: function (e) {
                if (null == e) return "";
                for (var i, n, r = "", o = 0, s = 0, a = t._f; s < e.length;) {
                    switch (n = e.charCodeAt(s) - 32, o++) {
                        case 0:
                            i = n << 1;
                            break;
                        case 1:
                            r += a(i | n >> 14), i = (16383 & n) << 2;
                            break;
                        case 2:
                            r += a(i | n >> 13), i = (8191 & n) << 3;
                            break;
                        case 3:
                            r += a(i | n >> 12), i = (4095 & n) << 4;
                            break;
                        case 4:
                            r += a(i | n >> 11), i = (2047 & n) << 5;
                            break;
                        case 5:
                            r += a(i | n >> 10), i = (1023 & n) << 6;
                            break;
                        case 6:
                            r += a(i | n >> 9), i = (511 & n) << 7;
                            break;
                        case 7:
                            r += a(i | n >> 8), i = (255 & n) << 8;
                            break;
                        case 8:
                            r += a(i | n >> 7), i = (127 & n) << 9;
                            break;
                        case 9:
                            r += a(i | n >> 6), i = (63 & n) << 10;
                            break;
                        case 10:
                            r += a(i | n >> 5), i = (31 & n) << 11;
                            break;
                        case 11:
                            r += a(i | n >> 4), i = (15 & n) << 12;
                            break;
                        case 12:
                            r += a(i | n >> 3), i = (7 & n) << 13;
                            break;
                        case 13:
                            r += a(i | n >> 2), i = (3 & n) << 14;
                            break;
                        case 14:
                            r += a(i | n >> 1), i = (1 & n) << 15;
                            break;
                        case 15:
                            r += a(i | n), o = 0
                    }
                    s++
                }
                return t.decompress(r)
            },
            compressToUint8Array: function (e) {
                for (var i = t.compress(e), n = new Uint8Array(2 * i.length), r = 0, o = i.length; r < o; r++) {
                    var s = i.charCodeAt(r);
                    n[2 * r] = s >>> 8, n[2 * r + 1] = s % 256
                }
                return n
            },
            decompressFromUint8Array: function (e) {
                if (null == e) return t.decompress(e);
                for (var i = new Array(e.length / 2), n = 0, r = i.length; n < r; n++) i[n] = 256 * e[2 * n] + e[2 * n + 1];
                return t.decompress(String.fromCharCode.apply(null, i))
            },
            compressToEncodedURIComponent: function (e) {
                return t.compressToBase64(e).replace("=", "$").replace("/", "-")
            },
            decompressFromEncodedURIComponent: function (e) {
                return e && (e = e.replace("$", "=").replace("-", "/")), t.decompressFromBase64(e)
            },
            compress: function (e) {
                if (null == e) return "";
                var i, n, r, o = {},
                    s = {},
                    a = "",
                    c = "",
                    u = "",
                    p = 2,
                    h = 3,
                    l = 2,
                    f = "",
                    d = 0,
                    v = 0,
                    g = t._f;
                for (r = 0; r < e.length; r += 1)
                    if (a = e.charAt(r), Object.prototype.hasOwnProperty.call(o, a) || (o[a] = h++, s[a] = !0), c = u + a, Object.prototype.hasOwnProperty.call(o, c)) u = c;
                    else {
                        if (Object.prototype.hasOwnProperty.call(s, u)) {
                            if (u.charCodeAt(0) < 256) {
                                for (i = 0; i < l; i++) d <<= 1, 15 == v ? (v = 0, f += g(d), d = 0) : v++;
                                for (n = u.charCodeAt(0), i = 0; i < 8; i++) d = d << 1 | 1 & n, 15 == v ? (v = 0, f += g(d), d = 0) : v++, n >>= 1
                            } else {
                                for (n = 1, i = 0; i < l; i++) d = d << 1 | n, 15 == v ? (v = 0, f += g(d), d = 0) : v++, n = 0;
                                for (n = u.charCodeAt(0), i = 0; i < 16; i++) d = d << 1 | 1 & n, 15 == v ? (v = 0, f += g(d), d = 0) : v++, n >>= 1
                            }
                            0 == --p && (p = Math.pow(2, l), l++), delete s[u]
                        } else
                            for (n = o[u], i = 0; i < l; i++) d = d << 1 | 1 & n, 15 == v ? (v = 0, f += g(d), d = 0) : v++, n >>= 1;
                        0 == --p && (p = Math.pow(2, l), l++), o[c] = h++, u = String(a)
                    } if ("" !== u) {
                    if (Object.prototype.hasOwnProperty.call(s, u)) {
                        if (u.charCodeAt(0) < 256) {
                            for (i = 0; i < l; i++) d <<= 1, 15 == v ? (v = 0, f += g(d), d = 0) : v++;
                            for (n = u.charCodeAt(0), i = 0; i < 8; i++) d = d << 1 | 1 & n, 15 == v ? (v = 0, f += g(d), d = 0) : v++, n >>= 1
                        } else {
                            for (n = 1, i = 0; i < l; i++) d = d << 1 | n, 15 == v ? (v = 0, f += g(d), d = 0) : v++, n = 0;
                            for (n = u.charCodeAt(0), i = 0; i < 16; i++) d = d << 1 | 1 & n, 15 == v ? (v = 0, f += g(d), d = 0) : v++, n >>= 1
                        }
                        0 == --p && (p = Math.pow(2, l), l++), delete s[u]
                    } else
                        for (n = o[u], i = 0; i < l; i++) d = d << 1 | 1 & n, 15 == v ? (v = 0, f += g(d), d = 0) : v++, n >>= 1;
                    0 == --p && (p = Math.pow(2, l), l++)
                }
                for (n = 2, i = 0; i < l; i++) d = d << 1 | 1 & n, 15 == v ? (v = 0, f += g(d), d = 0) : v++, n >>= 1;
                for (;;) {
                    if (d <<= 1, 15 == v) {
                        f += g(d);
                        break
                    }
                    v++
                }
                return f
            },
            decompress: function (e) {
                if (null == e) return "";
                if ("" == e) return null;
                var i, n, r, o, s, a, c, u = [],
                    p = 4,
                    h = 4,
                    l = 3,
                    f = "",
                    d = "",
                    v = t._f,
                    g = {
                        string: e,
                        val: e.charCodeAt(0),
                        position: 32768,
                        index: 1
                    };
                for (i = 0; i < 3; i += 1) u[i] = i;
                for (r = 0, s = Math.pow(2, 2), a = 1; a != s;) o = g.val & g.position, g.position >>= 1, 0 == g.position && (g.position = 32768, g.val = g.string.charCodeAt(g.index++)), r |= (o > 0 ? 1 : 0) * a, a <<= 1;
                switch (r) {
                    case 0:
                        for (r = 0, s = Math.pow(2, 8), a = 1; a != s;) o = g.val & g.position, g.position >>= 1, 0 == g.position && (g.position = 32768, g.val = g.string.charCodeAt(g.index++)), r |= (o > 0 ? 1 : 0) * a, a <<= 1;
                        c = v(r);
                        break;
                    case 1:
                        for (r = 0, s = Math.pow(2, 16), a = 1; a != s;) o = g.val & g.position, g.position >>= 1, 0 == g.position && (g.position = 32768, g.val = g.string.charCodeAt(g.index++)), r |= (o > 0 ? 1 : 0) * a, a <<= 1;
                        c = v(r);
                        break;
                    case 2:
                        return ""
                }
                for (u[3] = c, n = d = c;;) {
                    if (g.index > g.string.length) return "";
                    for (r = 0, s = Math.pow(2, l), a = 1; a != s;) o = g.val & g.position, g.position >>= 1, 0 == g.position && (g.position = 32768, g.val = g.string.charCodeAt(g.index++)), r |= (o > 0 ? 1 : 0) * a, a <<= 1;
                    switch (c = r) {
                        case 0:
                            for (r = 0, s = Math.pow(2, 8), a = 1; a != s;) o = g.val & g.position, g.position >>= 1, 0 == g.position && (g.position = 32768, g.val = g.string.charCodeAt(g.index++)), r |= (o > 0 ? 1 : 0) * a, a <<= 1;
                            u[h++] = v(r), c = h - 1, p--;
                            break;
                        case 1:
                            for (r = 0, s = Math.pow(2, 16), a = 1; a != s;) o = g.val & g.position, g.position >>= 1, 0 == g.position && (g.position = 32768, g.val = g.string.charCodeAt(g.index++)), r |= (o > 0 ? 1 : 0) * a, a <<= 1;
                            u[h++] = v(r), c = h - 1, p--;
                            break;
                        case 2:
                            return d
                    }
                    if (0 == p && (p = Math.pow(2, l), l++), u[c]) f = u[c];
                    else {
                        if (c !== h) return null;
                        f = n + n.charAt(0)
                    }
                    d += f, u[h++] = n + f.charAt(0), n = f, 0 == --p && (p = Math.pow(2, l), l++)
                }
            }
        };
        return t
    }();
    self.addEventListener("message", (function (e) {
        var i, n = e.data,
            r = n[0],
            o = n[1],
            s = n[2];
        switch (r) {
            case "base64":
                i = t.compressToBase64(o);
                break;
            case "byteArray":
                i = t.compressToUint8Array(o).buffer
        }
        self.postMessage([s, i])
    }))
})();