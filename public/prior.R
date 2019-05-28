library(rjson);
library(pwr);


x1 <- commandArgs()[5];

xx1 <- fromJSON(x1);

effect_size <- as.numeric(xx1["effect_size"]);
power <- as.numeric(xx1["power"]);
p_value <- as.numeric(xx1["p_value"]);

result <- pwr.t.test(d = effect_size, power = power, sig.level = p_value);
xx1["result_n"] <- result$n;
cat(toJSON(c(xx1["result_n"])));
