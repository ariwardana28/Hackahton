import React from 'react';
import {
  Button,
  Text,
  View,
  Image,
  ScrollView,
  StyleSheet,
  Badge,
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
import { Icon, PricingCard, ListItem } from 'react-native-elements';

class KartuScreen extends React.Component {
  render() {
    return (
      <ScrollView>
        <Card title="Ikan itu Iwak">
          <CardImage source={require('./images/iwak-patin.jpg')} />
          <CardTitle subtitle="Ikan Patin" />
          <CardContent text="pH : 6 - 7" />
          <CardAction separator={true} inColumn={false}>
            <CardButton
              onPress={() => {
                alert('Ini Tombol', 'Ini juga');
              }}
              title="Share"
              color="#FEB557"
            />
            <CardButton onPress={() => {}} title="Explore" color="#FEB557" />
          </CardAction>
        </Card>
        <Card title="Ikan itu Iwak">
          <CardImage source={require('./images/Ikan-mas.jpg')} />
          <CardTitle subtitle="Ikan Mas" />
          <CardContent text="pH : 7-8" />
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
        source={require('./images/tekno1.png')}
        style={{ width: 200, height: 30 }}
      />
    );
  }
}

class HomeScreen extends React.Component {
  static navigationOptions = {
    headerTitle: (
      <Image
        source={require('./images/tekno1.png')}
        style={{
          width: 340,
          height: 45,
          justifyContent: 'center',
          alignContent: 'center',
        }}
      />
    ),
    headerStyle: {
      backgroundColor: '#fff',
    },
    headerTintColor: '#fff',
    headerTitleStyle: {
      fontWeight: 'bold',
      justifyContent: 'center',
      alignContent: 'center',
      alignItems: 'center',
    },
  };
  render() {
    return (
      <ScrollView>
        <View style={styles.container}>
          <View style={{ flex: 1 }}>
            <View style={{ left: 20, flexDirection: 'row' }}>
              <Image
                style={{ width: 100, height: 100 }}
                source={require('./images/graph.png')}
              />
              <Image
                style={{ width: 100, height: 100, left: 120 }}
                source={require('./images/pond.png')}
              />
            </View>
            <View style={{ left: 20, flexDirection: 'row' }}>
              <Text style={{ textAlign: 'center' }}>
                pH
                {'\n'}
                Baik
              </Text>
              <Text style={{ left: 190, textAlign: 'center' }}>
                Kejernihan Air
                {'\n'}
                Baik
              </Text>
            </View>
            <View
              style={{
                flex: 1,
                flexDirection: 'column',
                justifyContent: 'center',
                alignContent: 'center',
                alignItems: 'center',
                paddingTop: 20,
              }}>
              <Image
                style={{
                  width: 100,
                  height: 100,
                }}
                source={require('./images/fish.png')}
              />
              <Text style={{ textAlign: 'center' }}>
                Ikan {'\n'}
                Sehat
              </Text>
            </View>
            <PricingCard
              color="#4f9deb"
              title="Measure"
              info={['Mengukur Kadar pH dan TDS Kolam Anda']}
              button={{ title: 'Ukur', icon: 'settings-remote' }}
              onButtonPress={() => alert('Kadar pH : 7,\nTDS : 100')}
            />
            <Button
              title="Detail Ikan"
              onPress={() => this.props.navigation.navigate('Kartu')}
            />
          </View>
        </View>
      </ScrollView>
    );
  }
}

class HistoryScreen extends React.Component {
  static navigationOptions = {
    title: 'History',
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
        <Text>
          Kolam 1 :{'\n'}
          pH:5,
          {'\n'}
          Salinitas:0,
          {'\n'}
          TDS:100
        </Text>
      </View>
    );
  }
}

const list = [
  {
    title: 'Cara Penggunaan',
    icon: 'doc',
  },
  {
    title: 'Hubungi Kami',
    icon: 'phone',
  },
  // more items
];
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
      <View>
        {list.map((item, i) => (
          <ListItem key={i} title={item.title} leftIcon={{ name: item.icon }} />
        ))}
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
      <View style={{ flex: 5, justifyContent: 'center', alignItems: 'center' }}>
        <Text>Details!</Text>
      </View>
    );
  }
}

const HomeStack = createStackNavigator({
  Home: { screen: HomeScreen },
  Details: { screen: DetailsScreen },
  Kartu: { screen: KartuScreen },
  History: { screen: HistoryScreen },
});

const SettingsStack = createStackNavigator({
  Settings: { screen: SettingsScreen },
  Details: { screen: DetailsScreen },
  Kartu: { screen: KartuScreen },
  History: { screen: HistoryScreen },
});

const HistoryStack = createStackNavigator({
  Settings: { screen: SettingsScreen },
  Details: { screen: DetailsScreen },
  History: { screen: HistoryScreen },
  Kartu: { screen: KartuScreen },
});

export default createAppContainer(
  createBottomTabNavigator(
    {
      Home: { screen: HomeStack },
      Settings: { screen: SettingsStack },
      History: { screen: HistoryScreen },
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
          } else if (routeName === 'History') {
            iconName = `ios-timer`;
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
});
