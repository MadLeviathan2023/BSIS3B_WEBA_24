export class TypingAnim {
    constructor(msgArr, elem, loop = true) {
        this.msgArr = msgArr;
        this.elem = elem;
        this.intervalDelay = 100;
        this.i = 0;
        this.j = 0;
        this.k = 0;
        this.loop = loop;
        this.timer;
    }

    _animateMsg() {
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
                            if (this.i < this.msgArr.length && this.loop == true){
                                this.timer = setInterval(this._animateMsg.bind(this), this.intervalDelay);
                            }
                        }, 750);
                    } else if (this.k > 0) {
                        if (this.intervalDelay === 100) {
                            this._changeIntervalDelay(50);
                        }
                        const sliced = this.msgArr[this.i].slice(0, -this.k);
                        this.elem.innerHTML = sliced;
                        if (this.k === this.j) {
                            this._changeIntervalDelay(100);
                            this.j = 0;
                            this.k = -1;
                            this.i++;
                        }
                    }
                    this.k++;
                }
            }
            if (this.i === this.msgArr.length) {
                if (this.loop == true){
                    this.i = 0;
                }
            }
        } catch (err) {
            console.log(err);
            clearInterval(this.timer);
        }
    }

    _changeIntervalDelay(newDelay) {
        this.intervalDelay = newDelay;
        clearInterval(this.timer);
        this.timer = setInterval(this._animateMsg.bind(this), this.intervalDelay);
    }

    start(){
        this.timer = setInterval(this._animateMsg.bind(this), this.intervalDelay);
    }

    stop(){
        clearInterval(this.timer);
    }
}