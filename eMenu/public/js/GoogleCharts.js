import { GoogleCharts } from './google-charts/node_modules/google-charts/dist/googleCharts.esm.js';
import * as global from './global.js';

export const DefaultColChartOptions = {
    title: 'Title',
    titleTextStyle: {
        color: global.Colors.OxfordBlue,
        fontName: 'Poppins',
        fontSize: 16
    },
    backgroundColor: 'white',
    vAxis: {
        textStyle: {
            color: global.Colors.OxfordBlue,
            fontName: 'Poppins'
        },
        format: 'decimal'
    },
    hAxis: {
        textStyle: {
            color: global.Colors.OxfordBlue,
            fontName: 'Poppins'
        },
        format: 'decimal'
    },
    legend: {
        textStyle: {
            color: global.Colors.OxfordBlue,
            fontName: 'Poppins'
        },
        position: 'bottom'
    },
    height: 400,
    colors: [global.Colors.OxfordBlue]
};

export class ColumnChart {
    constructor() {
        this._chartElem = null;
        this._data = null;
        this._options = DefaultColChartOptions;
    }
  
    _drawColumnChart(elem, data, options) {
        try {
            this._data = GoogleCharts.api.visualization.arrayToDataTable(data);
            this._options = options;
            this._chartElem = new GoogleCharts.api.visualization.ColumnChart(elem);
            this._chartElem.draw(this._data, this._options);
        } catch (err) {
            console.error('Error drawing column chart:', err);
        }
    }
  
    draw
    (elem, data, options = this._options)
    {
        GoogleCharts.load(() => {
            this._drawColumnChart(elem, data, options);
        });
    }
}

export class PieChart{
    constructor() {
        this._chartElem = null;
        this._data = null;
        this._options = null;
    }
  
    _drawPieChart(elem, data, options) {
        try {
            this._data = GoogleCharts.api.visualization.arrayToDataTable(data);
            this._options = options;
            this._chartElem = new GoogleCharts.api.visualization.PieChart(elem);
            this._chartElem.draw(this._data, this._options);
        } catch (err) {
            console.error('Error drawing pie chart:', err);
        }
    }
  
    draw(elem, data, options) {
        GoogleCharts.load(() => {
            this._drawPieChart(elem, data, options);
        });
    }
}