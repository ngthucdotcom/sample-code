sudo modprobe -r asus_nb_wmi
sudo modprobe asus_nb_wmi wapf=1 
sudo rfkill unblock all
rfkill list all
sudo -i
echo "options asus_nb_wmi wapf=1" | sudo tee /etc/modprobe.d/asus_nb_wmi.conf
exit
echo "Exit sudo"
echo "Xoa thu muc sudo fuser -cuk /var/lib/dpkg/lock neu co "
sudo fuser -cuk /var/lib/dpkg/lock
echo "Xoa thu muc sudo rm -f /var/lib/dpkg/lock neu co"
sudo rm -f /var/lib/dpkg/lock
echo "Done!"
echo "Update gksu"
sudo apt-get install gksu -y
echo "Done"
gksudo gedit /etc/rc.local
echo "Viet vao rfkill unblock wireless "
