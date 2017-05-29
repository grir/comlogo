/*
 * Function to compare two images (simple method)
 * img1, img2 are imageData get from canvas contex function
 * returns percange of match
 */
function basic_compare (img1, img2) {
    var count = 0;
    for (var i = 0; img1.length > i; i+=4) {
        if (color_check(i, img1, img2)) {
            count++;
            continue;
        }
        if (img1[i] == img2[i] && img1[i + 1] == img2[i + 1] && img1[i + 2] == img2[i + 2]) {
            count++;
        } /*else {
            console.log(i+": "+"["+img1[i]+", "+img1[i+1]+", "+img1[i+2]+"] "+"["+img2[i]+", "+img2[i+1]+", "+img2[i+2]+"] ");
        }*/
    }
    return count/(img1.length/4)*100;
}

/*
 * Function to compare two images (Mean Squared Error method)
 * img1, img2 are imageData get from canvas contex function, len and wid are Images length and width
 * returns MSE value >= 0, where 0 is perfect match
 */
function MSE (img1, img2, len, wid) {
    var dif, sum = 0, j = 0;
    for (var i = 0; img1.length > i; i++) {
        if (j + 4 < i) {
            j += 4;
        }
        if (color_check(j, img1, img2)) {
            dif = 0;
        } else {
            dif = img1[i] - img2[i];
        }
        sum += (dif*dif);
    }
    return sum/(len*wid)/4;
}

/*
 * Function to compare two images (Mean Squared Error method)
 * img1, img2 are imageData get from canvas contex function, len and wid are Images length and width
 * returns MSE value >= 0, where 0 is perfect match
 */
function color_check(i, img1, img2) {
    if ( (img1[i] == img1[i + 1] &&  img1[i + 1] == img1[i + 2] && (img1[i] == 255 || img1[i] == 0))
        &&  (img2[i] == img2[i + 1] &&  img2[i + 1] == img2[i + 2] && (img2[i] == 255 || img2[i] == 0)) ) {
        return true;
    }
    return false;
}