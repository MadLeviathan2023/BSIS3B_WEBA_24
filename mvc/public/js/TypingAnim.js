export class TypingAnim {
    constructor(msgArr, elem, intervalDelay = 100) {
        this.msgArr = msgArr;
        this.elem = elem;
        this.intervalDelay = intervalDelay;
        this.i = 0;
        this.j = 0;
        this.k = 0;
        this.timer = setInterval(this.animatedWelcomeMsg.bind(this), this.intervalDelay);
    }

    animatedWelcomeMsg() {
        try {
            if (this.i < this.msgArr.length) {
                if (this.j < this.msgArr[this.i].length) {
                    const spanElem = document.createElement('span');
                    spanElem.innerHTML = this.msgArr[this.i][this.j];
                    this.elem.append(spanElem);
                    this.j++;
                } else if (this.j === this.msgArr[this.i].length) {
                    if (this.k === 0) {
                        clearInterval(this.timer);
                        setTimeout(() => {
                            this.timer = setInterval(this.animatedWelcomeMsg.bind(this), this.intervalDelay);
                        }, 750);
                    } else if (this.k > 0) {
                        if (this.intervalDelay === 100) {
                            this.changeIntervalDelay(50);
                        }
                        const sliced = this.msgArr[this.i].slice(0, -this.k);
                        this.elem.innerHTML = sliced;
                        if (this.k === this.j) {
                            this.changeIntervalDelay(100);
                            this.j = 0;
                            this.k = -1;
                            this.i++;
                        }
                    }
                    this.k++;
                }
            }
            if (this.i === this.msgArr.length) {
                this.i = 0;
            }
        } catch (err) {
            console.log(err);
            clearInterval(this.timer);
        }
    }

    changeIntervalDelay(newDelay) {
        this.intervalDelay = newDelay;
        clearInterval(this.timer);
        this.timer = setInterval(this.animatedWelcomeMsg.bind(this), this.intervalDelay);
    }
}