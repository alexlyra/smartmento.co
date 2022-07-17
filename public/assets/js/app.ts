export const slugify = (str:String): String => {
    const from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;"
    const to = "aaaaaeeeeeiiiiooooouuuunc------";
    const convert = (letter:String): number|null => {
        letter = letter.toLowerCase();
        let pos:number|null = null;
        from.split('').forEach((compare:String, index:number) => {
            if (compare === letter) {
                pos = index;
            }
        });
        return pos;
    }

    const newText = str.split('').map((letter, i) => {
        const pos = convert(letter);
        if (pos !== null) {
            return letter.toLowerCase().replace(new RegExp(from.charAt(pos), 'g'), to.charAt(pos));
        } else {
            return letter.toLowerCase();
        }
    });
    console.log(newText);

    return newText
    .toString()                     // Cast to string
    .toLowerCase()                  // Convert the string to lowercase letters
    .trim()                         // Remove whitespace from both sides of a string
    .replace(/\s+/g, '-')           // Replace spaces with -
    .replace(/&/g, '-y-')           // Replace & with 'and'
    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
    .replace(/\-\-+/g, '-');        // Replace multiple - with single -
}