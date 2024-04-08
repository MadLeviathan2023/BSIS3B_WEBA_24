export class TypingAnim {
    constructor(msgArr, elem, loop = true, intervalDelay = 100) {
        this.msgArr = msgArr;
        this.elem = elem;
        this.defaultInterval = intervalDelay;
        this.intervalDelay = intervalDelay;
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
                }
                else if (this.j === this.msgArr[this.i].length) {
                    if (this.k === 0) {
                        this.stop();
                        if (this.i < this.msgArr.length && this.loop == true){
                            setTimeout(() => {
                                this.start();
                            }, 750);
                        }
                    }
                    else if (this.k > 0) {
                        if (this.intervalDelay === this.defaultInterval) {
                            this._changeIntervalDelay(50);
                        }
                        const sliced = this.msgArr[this.i].slice(0, -this.k);
                        this.elem.innerHTML = sliced;
                        if (this.k === this.j) {
                            this.intervalDelay = this.defaultInterval;
                            this._changeIntervalDelay(this.intervalDelay);
                            this.j = 0;
                            this.k = -1;
                            this.i++;
                        }
                    }
                    this.k++;
                }
            }
            else if (this.i === this.msgArr.length) {
                this.i = 0;
            }
        } catch (err) {
            console.log(err);
            this.stop();
        }
    }

    _changeIntervalDelay(newDelay) {
        this.intervalDelay = newDelay;
        this.stop();
        this.start();
    }

    start(){
        this.timer = setInterval(this._animateMsg.bind(this), this.intervalDelay);
    }

    stop(){
        clearInterval(this.timer);
    }
}