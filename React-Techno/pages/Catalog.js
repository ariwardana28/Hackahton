import React, { Component } from "react";
import {
    Platform,
    StyleSheet,
    Text,
    View,
    Button,
    TouchableOpacity
} from "react-native";
import AwesomeAlert from 'react-native-awesome-alerts';

class Catalog extends Component {
    static navigationOption ={
        header:null,
    }
    constructor(props) {
        super(props);
        this.state = { showAlert: false };
      };
     
      showAlert = () => {
        this.setState({
          showAlert: true
        });
      };
     
      hideAlert = () => {
        this.setState({
          showAlert: false
        });
      };
    render(){
      const {showAlert} = this.state;
        return(
            <View style={styles.container}>
 
            <Text>I'm AwesomeAlert</Text>
            <TouchableOpacity onPress={() => {
              this.showAlert();
            }}>
              <View style={styles.button}>
                <Text style={styles.text}>Try me!</Text>
              </View>
            </TouchableOpacity>
     
            <AwesomeAlert
              show={showAlert}
              showProgress={false}
              title="AwesomeAlert"
              message="I have a message for you!"
              closeOnTouchOutside={true}
              closeOnHardwareBackPress={false}
              showCancelButton={true}
              showConfirmButton={true}
              cancelText="No, cancel"
              confirmText="Yes, delete it"
              confirmButtonColor="#DD6B55"
              onCancelPressed={() => {
                this.hideAlert();
              }}
              onConfirmPressed={() => {
                this.hideAlert();
              }}
            />
          </View>
        );
    }
}

export default Catalog;

const styles = StyleSheet.create({
    container:{
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center'
    },
    navBar: {
        marginTop: 25,
        height: 55,
        backgroundColor: 'white',
        elevation: 3,
        paddingHorizontal: 15,
        flexDirection: 'row',
        alignItems: 'center',
        justifyContent: 'space-between'
      },
      rightNav: {
        flexDirection: 'row'
      },
      navItem: {
        marginLeft: 25
      },
      button: {
        margin: 10,
        paddingHorizontal: 10,
        paddingVertical: 7,
        borderRadius: 5,
        backgroundColor: "#AEDEF4",
      },
      text: {
        color: '#fff',
        fontSize: 15
      }
})