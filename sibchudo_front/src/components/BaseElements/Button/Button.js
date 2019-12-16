import React, {Component} from "react";
import './Button.css';

class Button extends Component {
    render() {
        let classes = this.props.color ?
            'button ' + this.props.color : 'button';
        return (
            <button className={classes}>{this.props.children}</button>
        );
    }
}

export default Button;