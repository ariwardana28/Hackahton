import React from 'react';
import {
  Button,
  Text,
  View,
  Image,
  ScrollView,
  StyleSheet,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import {
  createStackNavigator,
  createBottomTabNavigator,
  createAppContainer,
} from 'react-navigation';
import {
  Card,
  CardTitle,
  CardContent,
  CardAction,
  CardButton,
  CardImage,
} from 'react-native-cards';
import AwesomeAlert from 'react-native-awesome-alerts';
import { Icon, PricingCard, Avatar } from 'react-native-elements';

class Kartu extends React.Component {
  render() {
    return (
      <ScrollView>
        <Card title="Ikan itu Iwak">
          <CardImage
            source={require('./images/ikan-bandeng.jpg')}
            title="Top 10 South African beaches"
          />
          <CardTitle subtitle="Number 6" />
          <CardContent text="Clifton, Western Cape" />
          <CardAction separator={true} inColumn={false}>
            <CardButton
              onPress={() => {
                alert('Ini Tombol', 'Ini juga');
              }}
              title="Share"
              color="black"
            />
            <CardButton onPress={() => {}} title="Explore" color="#FEB557" />
          </CardAction>
        </Card>
        <Card title="Ikan itu Iwak">
          <CardImage
            source={require('./images/ikan-bandeng.jpg')}
            title="Top 10 South African beaches"
          />
          <CardTitle subtitle="Number 6" />
          <CardContent text="Clifton, Western Cape" />
          <CardAction separator={true} inColumn={false}>
            <CardButton onPress={() => {}} title="Share" color="#FEB557" />
            <CardButton onPress={() => {}} title="Explore" color="#FEB557" />
          </CardAction>
        </Card>
      </ScrollView>
    );
  }
}

class LogoTitle extends React.Component {
  render() {
    return (
      <Image
        source={require('./images/logo.png')}
        style={{ width: 150, height: 30 }}
      />
    );
  }
}

class HomeScreen extends React.Component {
  static navigationOptions = {
    headerTitle: <LogoTitle />,
    headerRight: (
      <Button
        onPress={() => alert('This is a button!')}
        title="Info"
        color="lightseagreen"
      />
    ),
    headerStyle: {
      backgroundColor: 'lightseagreen',
    },
    headerTintColor: '#fff',
    headerTitleStyle: {
      fontWeight: 'bold',
    },
  };
  render() {
    return (
      <View style={styles.container}>
        <View style={{flex:1,}}>
          <PricingCard
            color="#4f9deb"
            title="Measure"
            //price="0"
            info={['Kadar pH, TDS All Core Features']}
            button={{ title: 'Ukur', icon: 'settings-remote' }}
            onButtonPress={() => alert('Kadar pH : 5,\nTDS : 100')}
          />
          <Avatar
  size="medium"
  source={{uri: "https://s3.amazonaws.com/uifaces/faces/twitter/kfriedson/128.jpg"}}
  onPress={() => console.log("Works!")}
  activeOpacity={0.7}
/>
        </View>
        {/*<Button //style={{paddingVertical: 20,}}
          title="Go to Settings"
          onPress={() => this.props.navigation.navigate('Settings')}
        />
        <Button
          title="Go to Details"
          onPress={() => this.props.navigation.navigate('Details')}
        />
        <Icon
          raised
          name="heartbeat"
          type="font-awesome"
          color="#f50"
          onPress={() => alert('hello')}
        />*/}
      </View>
    );
  }
}

class SettingsScreen extends React.Component {
  static navigationOptions = {
    title: 'Setting',
    headerStyle: {
      backgroundColor: 'lightseagreen',
    },
    headerTintColor: '#fff',
    headerTitleStyle: {
      fontWeight: 'bold',
    },
  };
  render() {
    return (
      <View style={{ flex: 5, justifyContent: 'center', alignItems: 'center' }}>
        <Text>Settings!</Text>
        <Button
          title="Go to Home"
          onPress={() => this.props.navigation.navigate('Home')}
        />
        <Button
          title="Go to Details"
          onPress={() => this.props.navigation.navigate('Details')}
        />
      </View>
    );
  }
}

class DetailsScreen extends React.Component {
  static navigationOptions = {
    title: 'Detail',
    headerStyle: {
      backgroundColor: 'lightseagreen',
    },
    headerTintColor: '#fff',
    headerTitleStyle: {
      fontWeight: 'bold',
    },
  };
  render() {
    return (
      <View style={{ flex: 2, justifyContent: 'center', alignItems: 'center' }}>
        <Text>Details!</Text>
      </View>
    );
  }
}

const HomeStack = createStackNavigator({
  Home: { screen: HomeScreen },
  Details: { screen: DetailsScreen },
  Kartu: { screen: Kartu },
});

const SettingsStack = createStackNavigator({
  Settings: { screen: SettingsScreen },
  Details: { screen: DetailsScreen },
  Kartu: { screen: Kartu },
});

export default createAppContainer(
  createBottomTabNavigator(
    {
      Home: { screen: HomeStack },
      Settings: { screen: SettingsStack },
      Kartu: { screen: Kartu },
    },
    {
      defaultNavigationOptions: ({ navigation }) => ({
        tabBarIcon: ({ focused, tintColor }) => {
          const { routeName } = navigation.state;
          let iconName;
          if (routeName === 'Home') {
            iconName = `ios-home`;
          } else if (routeName === 'Settings') {
            iconName = `ios-options`;
          } else if (routeName === 'Kartu') {
            iconName = 'ios-options';
          }

          // You can return any component that you like here! We usually use an
          // icon component from react-native-vector-icons
          return <Ionicons name={iconName} size={25} color={tintColor} />;
        },
      }),
      tabBarOptions: {
        activeTintColor: 'lightseagreen',
        inactiveTintColor: 'gray',
      },
    }
  )
);

const styles = StyleSheet.create({
  container: {
    flex: 1,
    flexDirection: 'row',
    justifyContent: 'space-around',
    size: 50,
  },
  /*Tombol1: {
    flex: 1,
    position: 'absolute',
    bottom: 150,
    flexDirection: 'column',
    justifyContent: 'space-evenly',
    paddingHorizontal: 20
  },
  Tombol2: {
    flex:1,
    position: 'absolute',
    bottom: 100,
    flexDirection: 'column',
    justifyContent: 'space-evenly',
    paddingHorizontal: 20
  }*/
});
