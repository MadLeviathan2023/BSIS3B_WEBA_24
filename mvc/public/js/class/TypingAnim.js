export class TypingAnim {
    constructor(msgArr, elem, loop = true, intervalDelay = 100) {
        this._msgArr = msgArr;
        this._elem = elem;
        this._defaultInterval = intervalDelay;
        this._intervalDelay = intervalDelay;
        this._ia = 0;
        this._ib = 0;
        this._ic = 0;
        this._loop = loop;
        this._timer;
    }

    _animateMsg() {
        try {
            if (this._ia < this._msgArr.length) {
                if (this._ib < this._msgArr[this._ia].length) {
                    const spanElem = document.createElement('span');
                    spanElem.innerHTML = this._msgArr[this._ia][this._ib];
                    this._elem.append(spanElem);
                    this._ib++;
                }
                else if (this._ib === this._msgArr[this._ia].length) {
                    if (this._ic === 0) {
                        this.stop();
                        if (this._ia < this._msgArr.length && this._loop == true){
                            setTimeout(() => {
                                this.start();
                            }, 750);
                        }
                    }
                    else if (this._ic > 0) {
                        if (this._intervalDelay === this._defaultInterval) {
                            this._changeIntervalDelay(50);
                        }
                        const sliced = this._msgArr[this._ia].slice(0, -this._ic);
                        this._elem.innerHTML = sliced;
                        if (this._ic === this._ib) {
                            this._intervalDelay = this._defaultInterval;
                            this._changeIntervalDelay(this._intervalDelay);
                            this._ib = 0;
                            this._ic = -1;
                            this._ia++;
                        }
                    }
                    this._ic++;
                }
            }
            else if (this._ia === this._msgArr.length) {
                this._ia = 0;
            }
        } catch (err) {
            console.log(err);
            this.stop();
        }
    }

    _changeIntervalDelay(newDelay) {
        this._intervalDelay = newDelay;
        this.stop();
        this.start();
    }

    start(){
        this._timer = setInterval(this._animateMsg.bind(this), this._intervalDelay);
    }

    stop(){
        clearInterval(this._timer);
    }
}