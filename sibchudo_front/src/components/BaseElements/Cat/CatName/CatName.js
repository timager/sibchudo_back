import React, {Component} from "react";

class CatName extends Component {
    render() {
        return (
            <span>
                {this.props.cat.name + " " + this.props.cat.litter.community.name}
                {(this.props.cat.community ? " из питомника " + this.props.cat.community.name : "")}
            </span>
        );
    }
}

export default CatName;