import React, {Component} from "react";
import CatColor from "../../../BaseElements/Cat/CatColor/CatColor";
import CatAge from "../../../BaseElements/Cat/CatAge/CatAge";
import CatGender from "../../../BaseElements/Cat/CatGender/CatGender";

class CatInfo extends Component {
    render() {
        return (
            <div>
                <h2>Информация о животном</h2><br/>
                <p>Имя: {this.props.cat.name}</p>
                <p>Дата рождения: <CatAge birthday={this.props.cat.litter.birthday}/></p>
                <p>Пол: <CatGender gender={this.props.cat.gender}/></p>
                <div>Окрас: <CatColor color={this.props.cat.color}/></div>
                <p>Питомник: {this.props.cat.community ? this.props.cat.community.name : this.props.cat.litter.community.name}</p>
            </div>
        );
    }
}

export default CatInfo;