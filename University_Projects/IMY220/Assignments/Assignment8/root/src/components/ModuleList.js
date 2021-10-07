/*Name: Matthew Reed
  Student No.: 19100133
  Position: 88*/

import React from "react";
import PropTypes from "prop-types";
import {Module} from "./Module";
import {MinimumMarkForm} from "./MinimumMarkForm";

export class ModuleList extends React.Component
{
    constructor(props)
    {
        super(props);
        this.state = {min: this.props.minimum};
        this.getMinNum = this.getMinNum.bind(this);
    }
    
    getMinNum(minNum)
    {
        this.setState({min: minNum});
    }
    
    render()
    {
        let arr = [];
        let arrComp = [];
        let minMark = this.state.min;
        
        arr = this.props.modules.filter( (element) => {
            if (element.mark > minMark)
            {
                return element;
            }
        } );
        
        for (let i = 0; i < arr.length; i++)
        {
            arrComp.push((<Module module={arr[i]} />));
        }
        
        return (<div className="row">
            <div className="col-12">
                <div className="row">
                    <div className="col-3">
                        <MinimumMarkForm minimumScoreNumber={this.getMinNum} />
                    </div>
                </div>
                <div className="row">
                    <div className="col-12">
                        <h1>Modules with a mark above {`${minMark}`}</h1>
                    </div>
                </div>
                <div className="row">
                    <div className="col-12">
                        <div className="row">
                            {arrComp}
                        </div>
                    </div>
                </div>
            </div>
        </div>);
    }
};

ModuleList.propTypes = {
    modules: PropTypes.array.isRequired,
    minimum: PropTypes.number.isRequired
};