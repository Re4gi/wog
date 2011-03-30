#include <signal.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/time.h>
#include <sys/types.h>
#include <unistd.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <netdb.h>
#include <arpa/inet.h>

#define deb  1

int old_l,new_l,i;

void nickname(int sock){
	write(sock,"nickname u up\n",14);
	write(sock,"nickname d down\n",16);
	write(sock,"nickname e east\n",16);
	write(sock,"nickname w west\n",16);
	write(sock,"nickname ne northeast\n",22);
	write(sock,"nickname nw northwest\n",22);
	write(sock,"nickname se southeast\n",22);
	write(sock,"nickname sw southwest\n",22);
	write(sock,"nickname s south\n",17);
	write(sock,"nickname n north\n",17);
	write(sock,"nickname dr *dark-elf*\n",23);
	write(sock,"nickname or *orc*\n",18);
	write(sock,"nickname go *goblin*\n",21);
	write(sock,"nickname sv *svirfneblin*\n",26);
	write(sock,"nickname mi *minotaur*\n",23);
	write(sock,"nickname du *duergar*\n",22);
	write(sock,"nickname tl *troll*\n",20);

}

void class(char * str, int sock){

FILE * fr;
char str1[100];
char c;
int i,j;

fr=fopen(str,"r");

	nickname(sock);
        c=getc(fr);
	while (c!=EOF){
		str1[0]='a';
		str1[1]='l';
		str1[2]='i';
		str1[3]='a';
		str1[4]='s';
		str1[5]=' ';
		i=6;
		while ((c!=' ') && (c!=EOF)){
			str1[i]=c;
			i++;
			c=getc(fr);
		}
		str1[i]=' ';
		i++;
		c=getc(fr);
		while ((c!='\n') && (c!=EOF)){
			str1[i]=c;
			i++;
			c=getc(fr);
		}
		str1[i]='\n';
		
		if (str1[6]!='*') write(sock,str1,i+1);
		c=getc(fr);

	}

	fclose(fr);
}

void   rutina (int x)
{if (fork()!=0) exit (-1);}

void spracuj_in(char * buf, int size, int sock)
{
int znak;


		printf ("%s",buf);
	
	
	if (strstr(buf,"assword")) write (sock,"Tanicka\n",8);
	if (strstr(buf,"wish to log back")) write(sock,"y\n",2);

if (strstr(buf,": paladin")) class("paladin_out.txt",sock);
if (strstr(buf,": cleric")) class("cleric_out.txt",sock);
if (strstr(buf,": thief")) class("thief_out.txt",sock);
if (strstr(buf,": fighter")) class("fighter_out.txt",sock);
if (strstr(buf,": slayer")) class("slayer_out.txt",sock);
if (strstr(buf,": mage")) class("mage_out.txt",sock);
if (strstr(buf,": ranger")) class("ranger_out.txt",sock);

	fflush(stdout);


}

void spracuj_out(char * buf, int size, int sock)
{
 write (sock, buf, size);	

}
int main(int argc, char *argv[])
{	
	int sock;
	struct sockaddr_in saddr;
	struct hostent * he;
	fd_set rd, act;

	//if (argc != 3) {
	//	fprintf (stderr, "%s: hm, xcem 2 params\n", argv[0]);
	//	return -1;
	//}
	staring:
	he = gethostbyname("wog.zutom.sk");
	if (!he) {
		fprintf (stderr, "%s: No address associated with name\n",
			argv[0]);
		return -1;
	}
	saddr.sin_family = AF_INET;
	saddr.sin_addr.s_addr = *((unsigned int *)he->h_addr);
	saddr.sin_port = htons(atoi("9990"));
	sock = socket(PF_INET, SOCK_STREAM, 0);
	if (sock == -1) {
		fprintf (stderr, "%s: hm, neviem spravit socket\n", argv[0]);
		return -1;
	}
	
	while (connect(sock, (struct sockaddr *)&saddr,
		sizeof(struct sockaddr_in)))
	printf ("Connection estabilished\n");
	sleep (1);
	
	signal (SIGXCPU,rutina);
	while (1) { /* hlavny kod */
		FD_ZERO(&rd);
		FD_ZERO(&act);
		FD_SET(sock, &rd);
		FD_SET(sock, &act);
		FD_SET(0, &rd);
		FD_SET(0, &act);
		select(sock+1, &rd, NULL, &act, NULL);
		if (FD_ISSET(sock, &act)) { /* connection closed */
			printf ("...Connection closed by for. host\n");
			return 0;
			
		}
		if (FD_ISSET(0, &act)) /* nieco strasne na vstupe, asi ^D */
			return 0;
			
		if (FD_ISSET(sock, &rd)) { /* prisli data zo siete */
			char buf[1024+1];
			int i;
			i = read(sock, buf, sizeof(buf)-1);
			buf[sizeof(buf)-1] = '\0';
			buf[i] = '\0';
			if (i <= 0) { /* chyba na kabli */
				printf ("Connection tvrdo closed by on\n");
				goto staring;
			}			spracuj_in(buf, i, sock);
		}
		if (FD_ISSET(0, &rd)) { /* nieco pekne sme stlacili */
			char buf[1024];
			int i;
			i = read(0, buf, sizeof(buf));
			if (i <= 0) { /* chyba na userovi */
				printf ("Skript bol ukonceny userom...\n");
				return 0;
			}
			spracuj_out(buf, i, sock);
		}
	}

}
